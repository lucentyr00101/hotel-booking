<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@home');

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('users', 'UserController');
    Route::resource('customers', 'CustomerController');
    Route::post('room-assignment', 'CustomerController@assign')->name('room-assignment');
    Route::get('/checkout/{customer}', 'CustomerController@checkout')->name('checkout');
    Route::group(['prefix' => '/invoice'], function() {
        Route::get('generate/{pivot_id}/c/{customer_id}', 'InvoiceController@generate')->name('invoice.generate');
    });
    Route::post('/payment/{customer}', 'PaymentController@store')->name('payment.create');
});