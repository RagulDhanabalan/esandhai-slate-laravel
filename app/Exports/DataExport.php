<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Customer;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\FromQuery;
use App\Models\CustomerModel;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DataExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;
    public function collection()
    {
        //
        // return CustomerModel::query();
        return DB::table('esandhai-slate')->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Customer Name',
            'Orders',
            'Amount',
            'On Boarded',
            'First Ordered',
            'Last Ordered',
            'Score',
        ];
    }
}