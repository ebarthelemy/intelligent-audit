<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/invoice-headers', function () {
    return App\InvoiceHeader::all();
});

Route::get('/invoice-details', function () {
    return App\InvoiceDetail::all();
});

Route::get('/invoice-charges', function () {
    return App\InvoiceDetail::all();
});
