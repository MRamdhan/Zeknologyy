<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function homeAdmin() {
        $produk = Produk::all();
        return view('admin.homeAdmin', compact('produk'));
    }
    function tambah() {
        $kategori = Kategori::all();
        return view('admin.tambah', compact('kategori'));
    }
    function edit(Produk $produk) {
        $kategori = Kategori::all();
        return view('admin.edit', compact('produk', 'kategori'));
    }
    function posttambah(Request $request) {
        $request->validate([
            'kategori_id' =>'required',
            'nama' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'harga' => 'required|numeric'
        ]);
        Produk::create([
            'kategori_id' => $request->kategori_id,
            'nama' => $request->nama,
            'foto' => $request->foto->store('img'),
            'harga' => $request->harga,
        ]);

        return redirect()->route('homeAdmin')->with('message', 'Berhasil menambah produk');
    }

    function postedit(Request $request, Produk $produk) {
        $data = $request->validate([
            'kategori_id'=>'required',
            'nama'=>'required',
            'foto'=>'',
            'harga' =>'required|numeric'
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->foto->store('img');
        } else {
            unset($data['foto']);
        }
        $produk->update($data);

        return redirect()->route('homeAdmin')->with('message', 'Berhasil mengedit produk');
    }

    function hapus(Produk $produk) {
        $produk->delete();

        return redirect()->route('homeAdmin')->with('message', 'Berhasil menghapus produk');
    }

    function kategori() {
        return view('admin.tambahKategori');
    }

    function postkategori(Request $request) {
        $request->validate([
            'nama' =>'required',
        ]);
        Kategori::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('homeAdmin')->with('message', 'Berhasil menambah kateogri');
    }
}
