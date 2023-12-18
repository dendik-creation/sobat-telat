<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $users = User::where('password', NULL)->count();
        $telats = Transaksi::count();
        return view('admin.index', ['title' => 'Dashboard'], compact('users', 'telats'));
    }
}
