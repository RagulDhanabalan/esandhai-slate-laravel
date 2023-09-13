<?php

namespace App\Http\Controllers;

use App\Models\CustomerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataExport;
use PDF;
use App\Exports\PdfExport;
use Illuminate\Support\Facades\Storage;



class Customer extends Controller
{
    public function customer()
    {
        $customers = DB::table('esandhai-slate')->get();
        return view('customer.all-customer')->with('customers', $customers);
    }


    public function exportCsv()
    {
        $export = new DataExport();
        return Excel::download($export, 'Customers.csv');
    }

    public function exportExcel()
    {
        $export = new DataExport();
        return Excel::download($export, 'Customers.xlsx');
    }

    public function exportPdf()
    {
        $customers = DB::table('esandhai-slate')->get();

        $pdf = PDF::loadView('customer.exportspdf', ['customers' => $customers]);

        // Generate a unique filename for the PDF
        $filename = 'customer_data_' . time() . '.pdf';

        // Store the PDF in the temporary storage
        Storage::put('pdf/' . $filename, $pdf->output());

        // Provide a link for the user to download the PDF
        return response()->download(storage_path('app/pdf/' . $filename), 'customer_data.pdf');
    }

}