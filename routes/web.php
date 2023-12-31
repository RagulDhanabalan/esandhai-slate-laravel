<?php
use App\Http\Controllers\Customer;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('layouts.esandhai-slate');
});
Route::get('/customer', [Customer::class, 'customer']);



Route::get('/export-csv', [Customer::class, 'exportCsv'])->name('export.csv');
Route::get('/export-excel', [Customer::class, 'exportExcel'])->name('export.excel');



Route::get('/export-pdf', [Customer::class, 'exportPdf'])->name('export.pdf');