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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/CustomerRegister', 'CustomerController@getCustomerRegister')->name('c_register');
Route::post('/CustomerRegister', 'CustomerController@postCustomerRegister')->name('c_register');

Route::get('/VendorRegister', 'VendorController@getVendorRegister')->name('v_register');
Route::post('/VendorRegister', 'VendorController@postVendorRegister')->name('v_register');

Route::get('/VendorRegister', function () {
    return view('auth/vendorRegistration');
})->name('v_register');

Route::get('/aboutUs', function () {
    return view('about_us');
})->name('about_us');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('home.admin');       //Admin
Route::get('/admin/customerDetails', 'AdminController@customerDetails')->name('home.admin.customer');       //Admin
Route::get('/admin/customerDetails/{id}', 'AdminController@customerDelete')->name('home.admin.customer.del');       //Admin
Route::get('/admin/vendorDetails', 'AdminController@vendorDetails')->name('home.admin.vendor');       //Admin
Route::get('/admin/vendorDetails/{id}', 'AdminController@vendorDelete')->name('home.admin.vendor.del');       //Admin

Route::get('/admin/orderDetails', 'AdminController@orderDetails')->name('home.admin.order');       //Admin
Route::get('/admin/auditDetails', 'AdminController@auditDetails')->name('home.admin.audit');       //Admin
Route::get('/admin/feedback', 'AdminController@feedback')->name('home.admin.feedback');       //Admin

Route::get('/vendor', 'NewOrderRequestController@index')->name('home.vendor');    //Vendor
Route::post('/vendor', 'NewOrderRequestController@postQuotation')->name('home.vendor');    //Vendor
Route::get('/vendor/placedOrders', 'NewOrderRequestController@getOrders')->name('home.vendor.orders');    //Vendor
Route::post('/vendor/done', 'NewOrderRequestController@orderDone')->name('home.vendor.orderDone');    //Vendor
Route::get('/Audit', 'NewOrderRequestController@audits')->name('home.Audit');    //Vendor
//Route::post('/Audit', 'NewOrderRequestController@audits')->name('home.Audit');    //Vendor


Route::get('/home', 'HomeController@index')->name('home');              //Customer
Route::post('/home', 'HomeController@postRequest')->name('home');              //Customer
Route::get('/home/orderRequest', 'HomeController@orderRequests')->name('home.orderRequests');              //Customer
Route::get('/home/orderRequest/{request_id}', 'HomeController@getQuotations')->name('home.quotations');              //Customer
Route::post('/home/orderRequest/send/{quotation_id}', 'HomeController@sendOrder')->name('home.quotations');              //Customer
Route::post('/home/orderRequest/cancel/{quotation_id}', 'HomeController@cancelOrder')->name('home.quotations.cancel');              //Customer
Route::get('/Audit', 'HomeController@audits')->name('home.Audit');              //Customer
Route::get('/home/feedback', 'feedbackController@index')->name('ratingNfeedback');              //Customer & vendor
Route::post('/home/feedback', 'feedbackController@postFeedback')->name('ratingNfeedback');              //Customer & vendor


Route::get('/Quotation/{quotationId}', 'QuotationPDFController@index')->name('generateQuotation');              //Customer


