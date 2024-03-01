<?php

namespace App\Http\Controllers;

use App\Models\CarWash;
use App\Models\Log;
use App\Models\Paket;
use App\Models\Produk;
use App\Models\Transaksi;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function Ramsey\Uuid\v1;

class OwnerController extends Controller
{
    public function report()
    {
        $data = Transaksi::all();
        $chartTransaksi = Transaksi::all();

        $groupedHistories = $chartTransaksi->groupBy(function ($history) {
            return \Carbon\Carbon::parse($history->created_at)->format('d-m-Y');
        })->map(function ($dailyHistories) {
            return [
                'date' => $dailyHistories->first()->created_at,
                'harga' => $dailyHistories->sum('harga'),
            ];
        });

        $tanggal = $groupedHistories->pluck('date')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('d-m-y');
        })->toArray();

        $profit = $groupedHistories->pluck('harga')->toArray();

        $totalPendapatan = array_sum($profit);

        $chart = (new LarapexChart)->setType('bar')
            ->setTitle('Cuci Mobil')
            ->setColors([
                '#25364F'
            ])
            ->setSubtitle('Data per Transaksi')
            ->setXAxis($tanggal)
            ->setDataset([
                [
                    'name' => 'Pendapatan',
                    'data' => $profit
                ]
            ]);
        return view('owner.owner', compact('chart', 'totalPendapatan', 'data'));
    }

    public function printInvoiceOwner(Transaksi $transaksi)
    {
        $invoice = [
            'invoice' => $transaksi
        ];
        $pdf = FacadePdf::loadView('templateInvoice', $invoice);
        return $pdf->download('Invoice ' . $transaksi->nama . '.pdf');
    }

    public function searchDateOwner(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $start_date = \Carbon\Carbon::parse($start_date)->startOfDay();
        $end_date = \Carbon\Carbon::parse($end_date)->endOfDay();

        $data = Transaksi::whereBetween('created_at', [$start_date, $end_date])->get();
        $groupedHistories = $data->groupBy(function ($history) {
            return \Carbon\Carbon::parse($history->created_at)->format('d-m-Y');
        })->map(function ($dailyHistories) {
            return [
                'date' => $dailyHistories->first()->created_at,
                'harga' => $dailyHistories->sum('harga'),
            ];
        });

        $tanggal = $groupedHistories->pluck('date')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('d-m-y');
        })->toArray();

        $profit = $groupedHistories->pluck('harga')->toArray();

        $totalPendapatan = array_sum($profit);

        $chart = (new LarapexChart)->setType('bar')
            ->setTitle('Cuci Mobil')
            ->setColors([
                '#25364F'
            ])
            ->setSubtitle('Data per Transaksi')
            ->setXAxis($tanggal)
            ->setDataset([
                [
                    'name' => 'Pendapatan',
                    'data' => $profit
                ]
            ]);
        return view('owner.owner', compact('chart', 'totalPendapatan', 'data'));
    }


    public function exportOwnerPdf(Request $request)
    {

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $start_date = \Carbon\Carbon::parse($start_date)->startOfDay();
        $end_date = \Carbon\Carbon::parse($end_date)->endOfDay();

        $data = Transaksi::whereBetween('created_at', [$start_date, $end_date])->get();

        $pdf = FacadePdf::loadView('templatePdf', compact('data'));

        return $pdf->download('data_pelanggan.pdf');
    }

    function searchOwner(Request $request)
    {
        $keyword = $request->input('keyword');
        $data = Transaksi::where('noTlp', 'like', '%' . $keyword . '%')->paginate(5);

        return view('owner.owner', compact('data'));
    }

    function logOwner()
    {
        $log = Log::all();
        return view('owner.logOwner', compact('log'));
    }
}
