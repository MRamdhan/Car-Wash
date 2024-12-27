<?php

namespace App\Http\Controllers;

use App\Models\CarWash;
use App\Models\Log;
use App\Models\Paket;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\Voucher;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KasirController extends Controller
{
    function pilih(Produk $produk)
    {
        $voucher = Voucher::all();
        return view('pilih', compact('produk', 'voucher'));
    }

    function postpilih(Request $request)
    {
        $request->validate([
            'namaPaket' => 'required',
            'harga' => 'required',
            'nama' => 'required',
            'noTlp' => 'required|min:10',
        ]);
        
        $id = Produk::first()->id;
        $diskon = 0;
        $harga = null;
        $id_voucher = $request->id_voucher;
        
        if($id_voucher){
            $voucher = Voucher::where('id', $id_voucher)->first();
            if($voucher){
                $diskon = $voucher->diskon;
            }
        }

        $hargaAwal =  $request->harga;
        $hargaAkhir = $hargaAwal - ($hargaAwal *($diskon / 100));

        Transaksi::create([
            'noTlp' => $request->noTlp,
            'nama' => $request->nama,
            'plat' => $request->plat,
            'namaPaket' => $request->namaPaket,
            'harga' => $hargaAkhir,
            'user_id' => auth()->id(),
            'produk_id' => $id
        ]);

        Log::create([
            'user_id' => auth()->id(),
            'activity' => 'Kasir berhasil menambah Transaksi ' . $request->nama . '!'
        ]); 

        return redirect()->route('report')->with('message', 'Transaksi Berhasil');
    }


    public function report()
    {
        $data = Transaksi::all();
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

        $data = Transaksi::whereBetween('created_at', [$start_date, $end_date])->get();

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
    function log()
    {
        $log = Log::where('user_id', auth()->id())->with('user')->get();
        return view('log', compact('log'));
    }

    function hapusT(Transaksi $transaksi)
    {
        $transaksi->delete();
        Log::create([
            'user_id' => auth()->id(),
            'activity' => 'Telah menghapus transaksi ' . $transaksi->nama . '!',
        ]);

        return redirect()->route('report')->with('message', 'Berhasil menghapus transaksi ' . $transaksi->nama . '!');
    }   
}
