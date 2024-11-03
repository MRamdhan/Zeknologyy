<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\DetailTransaksi;
use App\Models\Produk;
use App\Models\Transaksi;   
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function detail(Request $request, Produk $produk) {
        return view('detail', compact('produk'));
    }
    function keranjang() {
        $detailtransaksi = DetailTransaksi::where('user_id', Auth::id())->where('status', 'keranjang')->with('produk')->get();
        return view('keranjang', compact('detailtransaksi'));
    }

    function postkeranjang(Request $request, Produk $produk) {
        $request->validate([
            'banyak' => 'required'
        ]);
        DetailTransaksi::create([
            'qty'=>$request->banyak,    
            'user_id'=>Auth::id(),
            'produk_id'=> $produk->id,
            'status'=>'keranjang',
            'totalharga'=> $produk->harga * $request->banyak,
        ]);
        return redirect()-> route('keranjang')->with('message','dimasukan kedalam keranjang');
    }

    function summary() {
        $detailtransaksi = DetailTransaksi::where('user_id',Auth::id())->where('status','cekout')->get();
        return view('summary',compact('detailtransaksi'));
    }
    
    function bayar(Request $request, DetailTransaksi $detailtransaksi) {
        $produk = $detailtransaksi->produk;
        return view('bayar',compact('produk','detailtransaksi'));

    }

    function postbayar(Request $request, DetailTransaksi $detailtransaksi) {
        $request->validate([
            'bukti_transaksi' => 'required|file'
        ]);
        $transaksi = Transaksi::create([
            'user_id' => Auth::id(),
            'totalharga' => $detailtransaksi->totalharga,
            'kode' => 'INV'.Str::random(8)
        ]);
        $detailtransaksi->update([
            'transaksi_id' => $transaksi->id,
            'status' => 'cekout',
            'bukti_transaksi' => $request->bukti_transaksi->store('img'),
        ]);
        return redirect()->route('summary')->with('message','berhasil checkout/upload bukti');
    }
}