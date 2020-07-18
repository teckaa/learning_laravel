<?php

use App\Http\Controllers\SendEmailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('login')->with('message', 'Login Failed');
});



Auth::routes(['verify' => true]);


Route::get('/home', 'CustomerController@index');
Route::get('/home', 'CustomerController@index');

//User Route
Route::get('/user', 'UserController@index');


//Customer Route
Route::get('customers', 'CustomerController@index');
Route::get('customers/create', 'CustomerController@create');
Route::post('customers/create', 'CustomerController@store');
Route::get('customers/{customer}/edit', 'CustomerController@edit');
Route::patch('customers/{customer}/update', 'CustomerController@update')->name('customer.update');
Route::delete('customers/{customer}/delete', 'CustomerController@delete')->name('customer.delete');
Route::get('customers/bin', 'CustomerController@trash')->name('customer.trash');
Route::get('customers/bin/{customer}', 'CustomerController@restore')->name('customer.restore');
Route::post('customers/bin', 'CustomerController@remove')->name('customer.remove');
Route::delete('customers/deleteall', 'CustomerController@deleteAll');



//Invoice Route
Route::get('invoices', 'InvoiceController@index');
Route::get('invoices/create', 'InvoiceController@create');
Route::post('invoices/create', 'InvoiceController@store');
Route::get('invoices/{invoice}/edit', 'InvoiceController@edit');
Route::patch('invoices/{invoice}/update', 'InvoiceController@update')->name('invoice.update');
Route::get('invoices/delete', 'InvoiceController@delete');


//Receipt Route
Route::get('receipts', 'ReceiptController@index');
Route::get('receipts/create', 'ReceiptController@index');
Route::post('receipts/create', 'ReceiptController@store');
Route::get('receipts/{receipt}/edit', 'ReceiptController@edit');
Route::patch('receipts/{receipt}/update', 'ReceiptController@update')->name('receipt.update');
Route::get('receipts/delete', 'ReceiptController@delete');

//Users Route
Route::get('user/edit', 'UserController@edit');
Route::patch('user/update', 'UserController@update')->name('user.update');
Route::get('user/settings', 'UserController@settings');
Route::patch('user/updateSettings', 'UserController@updateSettings')->name('user.updateSettings');

Route::get('user/picture', 'UserController@picture');
Route::post('user/upload', 'UserController@editPicture');



//Users Route

Route::get('search', 'SearchController@index')->name('search');


Route::get('sendMail', 'MailController@index');
Route::get('send', 'MailController@send');

// Clear browser cache

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

