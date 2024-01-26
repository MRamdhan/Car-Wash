<?php

namespace App\Http\Controllers;

use App\Models\CarWash;
use App\Models\Paket;
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

        Paket::create([
            'paket' => $request->paket,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('homeAdmin')->with('message', 'Paket berhasil di tambah');
    }

    function editPaket(Paket $paket) {
        return view('admin.editPaket', compact('paket'));
    }

    function postEditPaket(Request $request, Paket $paket) {
        $data = $request->validate([
            'paket' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required'
        ]);

        $paket->update($data);
        return redirect()->route('homeAdmin')->with('message','Paket berhasil di ubah');
    }

    function hapusPaket(Paket $paket) {
        $paket->delete();

        return redirect()->route('homeAdmin')->with('message', 'Paket berhasil di hapus');
    }
}
