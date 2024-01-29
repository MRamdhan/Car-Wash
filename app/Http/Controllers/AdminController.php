<?php

namespace App\Http\Controllers;

use App\Models\CarWash;
use App\Models\Paket;
use App\Models\Produk;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    function tambahPaket() {
        return view('admin.tambahPaket');
    }

    function postTambahPaket(Request $request)  {
        $request->validate([
            'paket' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
        ]);

        Produk::create([
            'paket' => $request->paket,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('homeAdmin')->with('message', 'Paket berhasil di tambah');
    }

    function editPaket(Produk $produk) {
        return view('admin.editPaket', compact('produk'));
    }

    function postEditPaket(Request $request, Produk $produk) {
        $data = $request->validate([
            'paket' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required'
        ]);

        $produk->update($data);
        return redirect()->route('homeAdmin')->with('message','Paket berhasil di ubah');
    }

    function hapusPaket(Produk $produk) {
        $produk->delete();

        return redirect()->route('homeAdmin')->with('message', 'Paket berhasil di hapus');
    }
}
