<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Customer extends Controller
{
    public function customer()
    {
        $customers = DB::table('esandhai-slate')->get();
        return view('customer.all-customer')->with('customers', $customers);
    }
}