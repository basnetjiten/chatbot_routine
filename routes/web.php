<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('/captcha', function () {
    return view('captcha');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*Route::get('{path}',"HomeController@index")->where( 'path', '([A-z\d-\/_.]+)?' );*/


Route::get('invoice', function () {
    return view('invoice');
});

Route::get('/r/{slug}', 'DonationController@donationForm')->name('donation');
Route::post('/payment', 'DonationController@proceedPayment')->name('payment');

Route::get('/alert/{token}', 'DonationController@donationAlertLink')->name('alertlink');
Route::get('/dispatchAlert', 'DonationController@dispatchDonationSuccessAlert')->name('donationAlert');
//Route::group(['middleware' => 'cors'], function () {
    Route::post('/updateSuccessTransaction', 'DonationController@updateSuccessTransaction');
//});


Route::get('transaction', 'ChartController@transaction')->name('transaction');
Route::get('donors', 'ChartController@donors')->name('load-my-donors');
Route::get('transpage', 'ChartController@transpage')->name('transpage');

Route::get('{path}',"HomeController@index")->where( 'path', '([A-z\d-\/_.]+)?' );
