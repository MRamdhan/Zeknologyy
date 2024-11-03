<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    function home(Request $request) {
        $kategori  = $request->query('kategori ');

        if ($kategori) {
            $kategori = Kategori::where('nama', $kategori )->first();
            if ($kategori) {
                $produk = Produk::where('kategori_id', $kategori->id)->get();
            } else {
                $produk = collect();
            }
        } else {
            $produk = Produk::all();
        }
    
        return view('home', compact('produk', 'kategori'));
    }
    function login() {
        return view('login');
    }

    function postlogin(Request $request) {
        $lgn = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($lgn)){
            $user = Auth::user();
            if($user-> role =='admin'){
                return redirect()->route('homeAdmin')->with('message', 'Selamat Datang Admin!');
            } else{
                return redirect()->route('home')->with('message', 'Selamat Datang Pelanggan!');
            }
        }
        return redirect()->back()->with('message', 'Username atau password salah!');
        
    }

    function daftar() {
        return view('daftar');
    }
    function postdaftar(Request $request) {
        $user = $request->validate([
            'nama' =>'required',
            'username' =>'required',
            'password' => 'required',
        ]);
        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => 'pelanggan',
        ]);
        return redirect()->route('login')->with('success', 'Pendaftaran berhasil, silahkan login!');
    }

    function logout() {
        Auth::logout();

        return redirect()->route(route: 'home')->with('message', 'Anda sudah logout!');
    }
}
