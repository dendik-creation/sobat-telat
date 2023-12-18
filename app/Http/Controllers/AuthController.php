<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index(){
        return view('login', ['title' => 'Login']);
    }

    public function login(Request $request){
        Session::flash('nis',$request->nis);
        if(Auth::attempt(['nis' => $request->nis, 'password' => $request->password])){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }else{
            return back()->with('failed', 'Login Gagal, Username atau Password Salah');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Logout Berhasil');
    }

    public function whoLogin(){
        $user = User::where('id', auth()->user()->id)->select(['id', 'nis', 'nama'])->first();
        return response()->json($user, 200);
    }

    public function update(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->first();
        if ($user) {
            $user->update($request->all());
            return back()->with('success', 'Profil Saya Berhasil Diperbarui');
        }
    }

    public function checkPw(Request $request){
        $request->validate([
            'current_pw' => 'required',
        ]);
        $user = User::where('id', auth()->user()->id)->first();
        if($user && Hash::check($request->current_pw, $user->password)){
            return response()->json(true, 200);
        }else{
            return response()->json("Password Salah", 401);
        }
    }

    public function newPw(Request $request){
        $request->validate([
            'new_pw' => 'required',
            'new_pw_confirm' => 'required',
        ]);
        $user = User::where('id', auth()->user()->id)->first();
        if($user){
            $user->update([
                'password' => bcrypt($request->new_pw)
            ]);
        }
        return response()->json(true, 200);
    }
}
