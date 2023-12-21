<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        // Filter List & Initial Query
        $filters = $request->all();
        $query = Transaksi::query();

        // Has Query
        if ($filters) {
            if ($request->has('nis_siswa') && $request->nis_siswa != '') {
                // Find User ID
                $siswa = User::where('nis', $request->nis_siswa)->first();
                // Push User ID
                $filters['user_id'] = $siswa['id'];
                // Remove nis_siswa from array
                unset($filters['nis_siswa']);
            }
            foreach ($filters as $key => $val) {
                if ($key != 'start_date' && $key != 'end_date' && $key != 'nis_siswa' && $key != 'keterangan') {
                    // Common Query
                    $query->where($key, $val);
                }
            }
            // Special Query

            //// DateRange && Keterangan
            if ($request->only(['start_date', 'end_date', 'keterangan']) && ($request->start_date != '' && $request->end_date != '' && $request->keterangan != '')) {
                $query->whereBetween('waktu_terlambat', [$request->start_date, $request->end_date])->where('keterangan', 'like', '%' . $request->keterangan . '%');
            }
            //// DateRange Only
            elseif ($request->only(['start_date', 'end_date']) && ($request->start_date != '' && $request->end_date != '')) {
                $query->whereBetween('waktu_terlambat', [$request->start_date, $request->end_date]);
            }
            //// Keterangan Only
            elseif ($request->only(['keterangan']) && $request->keterangan != '') {
                $query->where('keterangan', 'like', '%' . $request->keterangan . '%');
            }
            // Results
            $terlambats = $query->latest()->get();
        }
        // No Query
        else {
            $terlambats = Transaksi::with('user')
                ->latest()
                ->get();
        }
        // // Blade
        return view('admin.transaksi.data_terlambat', ['title' => 'Data Keterlambatan'], compact('terlambats'));
    }

    public function tambah()
    {
        return view('admin.transaksi.tambah_terlambat', ['title' => 'Tambah Keterlambatan']);
    }

    public function checkNis(Request $request)
    {
        $siswa = User::with('kelas')
            ->where('nis', $request->nis)
            ->first();
        if ($siswa) {
            return response()->json($siswa, 200);
        } else {
            return response()->json('NIS Tidak Ditemukan', 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'keterangan' => 'required',
            'jam_ke' => 'required',
            'decision' => 'required',
        ]);

        $today = Carbon::now();
        $siswa = User::where('nis', $request->nis)->first();
        if ($siswa) {
            $terlambat = Transaksi::create([
                'user_id' => $siswa->id,
                'kelas_id' => $siswa->kelas_id,
                'jam_ke' => $request->jam_ke,
                'keterangan' => $request->keterangan,
                'waktu_terlambat' => $today,
            ]);
            if ($request->decision == 'with_print') {
                $targetUrl = 'cetak-terlambat/' . $terlambat->id;
                return back()->with('targetUrl', $targetUrl);
            } else {
                return redirect('/')->with('success', 'Data Terlambat Berhasil Dikirim');
            }
        }
    }

    public function print($id)
    {
        $terlambat = Transaksi::with('user')
            ->where('id', $id)
            ->first();
        if ($terlambat) {
            return view('admin.transaksi.cetak_terlambat', ['title' => 'Cetak Struk'], compact('terlambat'));
        } else {
            return back()->with('failed', 'Gagal Cetak, Coba Lagi');
        }
    }

    public function export(Request $request)
    {
        // Filter List & Initial Query
        $filters = $request->all();
        $query = Transaksi::query();

        // Has Query
        if ($filters) {
            if ($request->has('nis_siswa') && $request->nis_siswa != '') {
                // Find User ID
                $siswa = User::where('nis', $request->nis_siswa)->first();
                // Push User ID
                $filters['user_id'] = $siswa['id'];
                // Remove nis_siswa from array
                unset($filters['nis_siswa']);
            }
            foreach ($filters as $key => $val) {
                if ($key != 'start_date' && $key != 'end_date' && $key != 'nis_siswa' && $key != 'keterangan') {
                    // Common Query
                    $query->where($key, $val);
                }
            }
            // Special Query

            //// DateRange && Keterangan
            if ($request->only(['start_date', 'end_date', 'keterangan']) && ($request->start_date != '' && $request->end_date != '' && $request->keterangan != '')) {
                $query->whereBetween('waktu_terlambat', [$request->start_date, $request->end_date])->where('keterangan', 'like', '%' . $request->keterangan . '%');
            }
            //// DateRange Only
            elseif ($request->only(['start_date', 'end_date']) && ($request->start_date != '' && $request->end_date != '')) {
                $query->whereBetween('waktu_terlambat', [$request->start_date, $request->end_date]);
            }
            //// Keterangan Only
            elseif ($request->only(['keterangan']) && $request->keterangan != '') {
                $query->where('keterangan', 'like', '%' . $request->keterangan . '%');
            }
            // Results
            $terlambats = $query->latest()->get();
        }
        // No Query
        else {
            $terlambats = Transaksi::with('user')
                ->latest()
                ->get();
        }

        // Passing Query Data
        //// Kelas
        if ($request->has('kelas_id')) {
            $kelas = Kelas::where('id', $request->kelas_id)->first();
        }else{
            $kelas = null;
        }
        //// DateRange
        if ($request->has('start_date') && $request->has('end_date') && ($request->start_date != '' && $request->end_date != '')) {
            $rentang_tanggal = date_format(date_create($request->start_date), 'd M Y') . ' - ' . date_format(date_create($request->end_date), 'd M Y');
        } else {
            $rentang_tanggal = null;
        }
        $filter_result = [
            'NIS' => $request->has('nis_siswa') ? $request->nis_siswa : null,
            'Rentang Tanggal' => $rentang_tanggal,
            'Kelas' => $kelas,
            'Alasan' => $request->has('keterangan') ? $request->keterangan : null
        ];

        $title = "Data Keterlambatan - " . date_format(date_create(Carbon::now()), 'd M Y');

        // Blade
        return view('admin.transaksi.export_terlambat', compact('terlambats', 'filter_result', 'title'));
    }
}
