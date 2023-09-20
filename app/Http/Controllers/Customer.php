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
        $isLoading = true;
        $customers = DB::table('esandhai-slate')->get();

        foreach ($customers as $customer) {
            $orders = $customer->orders;
            $amount = $customer->amount;
            $score = $customer->score;
            $id = $customer->id;
        }

        return view('customer.all-customer', compact('customers', 'isLoading', 'orders', 'amount', 'score', 'id'));
    }



    public function exportCsv()
    {
        $isLoading = true;
        $export = new DataExport();
        return Excel::download($export, 'Customers.csv');
    }

    public function exportExcel()
    {
        $isLoading = true;
        $export = new DataExport();
        return Excel::download($export, 'Customers.xlsx');
    }

    public function exportPdf()
    {
        $isLoading = true;
        $customers = DB::table('esandhai-slate')->paginate(5);

        $pdf = PDF::loadView('customer.exportspdf', ['customers' => $customers]);

        // Generate a unique filename for the PDF
        $filename = 'Invoice.pdf';

        // Store the PDF in the temporary storage
        Storage::put('pdf/' . $filename, $pdf->output());

        // Provide a link for the user to download the PDF
        return response()->download(storage_path('app/pdf/' . $filename), 'Invoice.pdf');
    }

}