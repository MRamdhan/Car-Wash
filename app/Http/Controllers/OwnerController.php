<?php

namespace App\Http\Controllers;

use App\Models\CarWash;
use App\Models\Paket;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OwnerController extends Controller
{
    public function report()
    {
        $data = CarWash::all();
        return view('owner.owner', compact('data'));
    }

    public function printInvoice(CarWash $carwash)
    {
        $invoice = [
            'invoice' => $carwash
        ];
        $pdf = FacadePdf::loadView('templateInvoice', $invoice);
        return $pdf->download('Invoice ' . $carwash->nama . '.pdf');
    }

    public function searchDate(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $start_date = \Carbon\Carbon::parse($start_date)->startOfDay();
        $end_date = \Carbon\Carbon::parse($end_date)->endOfDay();

        $data = CarWash::whereBetween('created_at', [$start_date, $end_date])->get();

        return view('owner.owner', compact('data'));
    }

    public function exportPdf(Request $request)
    {

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $start_date = \Carbon\Carbon::parse($start_date)->startOfDay();
        $end_date = \Carbon\Carbon::parse($end_date)->endOfDay();

        $data = CarWash::whereBetween('created_at', [$start_date, $end_date])->get();

        $pdf = FacadePdf::loadView('templatePdf', compact('data'));

        return $pdf->download('data_pelanggan.pdf');
    }
}
