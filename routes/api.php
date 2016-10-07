<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

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
