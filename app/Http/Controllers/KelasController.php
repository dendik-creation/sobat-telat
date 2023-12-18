<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(Request $request){
        if($request->has('type')){
            $kelas = Kelas::whereNot('kelas', 'ADMIN')->whereNot('kelas', 'ALUMNI')->whereNot('kelas', 'UMUM')->whereNot('kelas', 'Guru BK')->get();
            return response()->json($kelas, 200);
        }else{
            $kelas = Kelas::whereNot('kelas', 'ADMIN')->get();
            return response()->json($kelas, 200);
        }
    }
}
