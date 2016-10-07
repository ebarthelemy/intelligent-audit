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

/*
 * Invoices
 */

// Report 1
Route::get('/invoices/{from}/{to}', [
    'uses' => 'InvoicesController@printAll'
]);

// Report 2
Route::get('/invoices/{from}/{to}/unmatched', [
    'uses' => 'InvoicesController@printUnmatched'
]);

/*
 * Trackings
 */

// Report 3
Route::get('/trackings/{from}/{to}/unmatched', [
    'uses' => 'TrackingsController@printUnmatched'
]);
