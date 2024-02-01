<?php

namespace App\Http\Controllers;

use App\Models\CarWash;
use App\Models\Log;
use App\Models\Paket;
use App\Models\Produk;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KasirController extends Controller
{
    function pilih(Produk $produk) {
        return view('pilih', compact('produk'));
    }

    function postpilih(Request $request, Transaksi $transaksi) {
        $request->validate([
            'namaPaket' => 'required',
            'harga' => 'required',
            'nama' => 'required',
            'noTlp' => 'required',
        ]);

        $id = Produk::first()->id;

        Transaksi::create([
            'namaPaket' => $request->namaPaket,
            'harga' => $request->harga,
            'nama' => $request->nama,
            'noTlp' => $request->noTlp,
            'user_id' => auth()->id(),
            'produk_id' => $id
        ]);

        Log::create([
            'user_id' => auth()->id(),
            'activity' => 'Kasir berhasil menbah Transaksi' . $request->nama .'!'
        ]);

        return redirect()->route('report')->with('message', 'Berhasil Memilih');
    }

    public function report()
    {
        $data = Transaksi::paginate(3);
        return view('report', compact('data'));
    }


    public function printInvoice(Transaksi $transaksi)
    {
        $invoice = [
            'invoice' => $transaksi
        ];
        $pdf = FacadePdf::loadView('templateInvoice', $invoice);
        return $pdf->download('Invoice ' . $transaksi->nama . '.pdf');
    }

    public function searchDate(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $start_date = \Carbon\Carbon::parse($start_date)->startOfDay();
        $end_date = \Carbon\Carbon::parse($end_date)->endOfDay();

        $data = Transaksi::whereBetween('created_at', [$start_date, $end_date])->paginate(3);

        return view('report', compact('data'));
    }

    public function exportPdf(Request $request)
    {

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $start_date = \Carbon\Carbon::parse($start_date)->startOfDay();
        $end_date = \Carbon\Carbon::parse($end_date)->endOfDay();

        $data = Transaksi::whereBetween('created_at', [$start_date, $end_date])->get();

        $pdf = FacadePdf::loadView('templatePdf', compact('data'));

        return $pdf->download('data_pelanggan.pdf');
    }

    function search(Request $request) {
        $keyword = $request->input('keyword');
        $data = Transaksi::where('noTlp', 'like', '%'. $keyword . '%')->paginate(5);

        return view('report', compact('data'));
    }
    function log() {
        $log = Log::where('user_id', auth()->id())->with('user')->get();
        return view('log', compact('log'));
    }
}
