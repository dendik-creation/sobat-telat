<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        // All Query
        if ($request->has('kelas_id') && $request->has('start_date') && $request->has('end_date') && $request->has('nis_siswa') && ($request->start_date != '' && $request->end_date != '' && $request->nis_siswa != '')) {
            $siswa = User::where('nis', $request->nis_siswa)->first();
            $terlambats = Transaksi::with('user')
                ->where('kelas_id', $request->kelas_id)
                ->whereBetween('waktu_terlambat', [$request->start_date, $request->end_date])
                ->where('user_id', $siswa['id'])
                ->get();
        }
        // DateRange & NIS
        elseif ($request->has('start_date') && $request->has('end_date') && $request->has('nis_siswa') && ($request->start_date != '' && $request->end_date != '' && $request->nis_siswa != '')) {
            $siswa = User::where('nis', $request->nis_siswa)->first();
            $terlambats = Transaksi::with('user')
                ->whereBetween('waktu_terlambat', [$request->start_date, $request->end_date])
                ->where('user_id', $siswa['id'])
                ->get();
        }
        // Kelas & NIS
        elseif ($request->has('kelas_id') && $request->has('nis_siswa') && $request->nis_siswa != '') {
            $siswa = User::where('nis', $request->nis_siswa)->first();
            $terlambats = Transaksi::with('user')
                ->where('kelas_id', $request->kelas_id)
                ->where('user_id', $siswa['id'])
                ->get();
        }
        // Kelas Only
        elseif ($request->has('kelas_id')) {
            $terlambats = Transaksi::with('user')
                ->where('kelas_id', $request->kelas_id)
                ->get();
        }
        // DateRange Only
        elseif ($request->has('start_date') && $request->has('end_date') && ($request->start_date != '' && $request->end_date != '')) {
            $terlambats = Transaksi::with('user')
                ->whereBetween('waktu_terlambat', [$request->start_date, $request->end_date])
                ->get();
        }
        // NIS Only
        elseif ($request->has('nis_siswa') && $request->nis_siswa != '') {
            $siswa = User::where('nis', $request->nis_siswa)->first();
            $terlambats = Transaksi::with('user')
                ->where('user_id', $siswa['id'])
                ->get();
        }
        // No Query
        else {
            $terlambats = Transaksi::with('user')
                ->latest()
                ->get();
        }
        // Blade
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
            'decision' => 'required',
        ]);
        $today = Carbon::now();
        $siswa = User::where('nis', $request->nis)->first();
        if ($siswa) {
            $terlambat = Transaksi::create([
                'user_id' => $siswa->id,
                'kelas_id' => $siswa->kelas_id,
                'keterangan' => $request->keterangan,
                'waktu_terlambat' => $today,
            ]);
            if($request->decision == 'with_print'){
                return redirect('cetak-terlambat/' . $terlambat->id);
            }else{
                return redirect('/')->with('success', 'Data Terlambat Berhasil Dikirim');
            }
        }
    }

    public function print($id){
        $terlambat = Transaksi::with('user')->where('id', $id)->first();
        if($terlambat){
            return view('admin.transaksi.cetak_terlambat', ['title' => 'Cetak Struk'], compact('terlambat'));
        }else{
            return back()->with('failed', 'Gagal Cetak, Coba Lagi');
        }
    }

    public function export(Request $request){
        // All Query
        if ($request->has('kelas_id') && $request->has('start_date') && $request->has('end_date') && $request->has('nis_siswa') && ($request->start_date != '' && $request->end_date != '' && $request->nis_siswa != '')) {
            $siswa = User::where('nis', $request->nis_siswa)->first();
            $terlambats = Transaksi::with('user')
                ->where('kelas_id', $request->kelas_id)
                ->whereBetween('waktu_terlambat', [$request->start_date, $request->end_date])
                ->where('user_id', $siswa['id'])
                ->get();
        }
        // DateRange & NIS
        elseif ($request->has('start_date') && $request->has('end_date') && $request->has('nis_siswa') && ($request->start_date != '' && $request->end_date != '' && $request->nis_siswa != '')) {
            $siswa = User::where('nis', $request->nis_siswa)->first();
            $terlambats = Transaksi::with('user')
                ->whereBetween('waktu_terlambat', [$request->start_date, $request->end_date])
                ->where('user_id', $siswa['id'])
                ->get();
        }
        // Kelas & NIS
        elseif ($request->has('kelas_id') && $request->has('nis_siswa') && $request->nis_siswa != '') {
            $siswa = User::where('nis', $request->nis_siswa)->first();
            $terlambats = Transaksi::with('user')
                ->where('kelas_id', $request->kelas_id)
                ->where('user_id', $siswa['id'])
                ->get();
        }
        // Kelas Only
        elseif ($request->has('kelas_id')) {
            $terlambats = Transaksi::with('user')
                ->where('kelas_id', $request->kelas_id)
                ->get();
        }
        // DateRange Only
        elseif ($request->has('start_date') && $request->has('end_date') && ($request->start_date != '' && $request->end_date != '')) {
            $terlambats = Transaksi::with('user')
                ->whereBetween('waktu_terlambat', [$request->start_date, $request->end_date])
                ->get();
        }
        // NIS Only
        elseif ($request->has('nis_siswa') && $request->nis_siswa != '') {
            $siswa = User::where('nis', $request->nis_siswa)->first();
            $terlambats = Transaksi::with('user')
                ->where('user_id', $siswa['id'])
                ->get();
        }
        // No Query
        else {
            $terlambats = Transaksi::with('user')
                ->latest()
                ->get();
        }

        // Blade
        return view('admin.transaksi.export_terlambat', ['title' => 'Export Data Keterlambatan'], compact('terlambats'));
    }
}
