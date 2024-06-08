<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
Route::get('/', function () {
    return view('home');
});

Route::get('invoice-generator', function (){
    return view('invoice-generator');
})->name('invoice-generator');

// Route::post('pull-invoice', )
Route::post('pull-invoice', [InvoiceController::class, 'pullInvoice'])->name('pull-invoice');