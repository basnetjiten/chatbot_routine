<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*Route::get('{path}',"HomeController@index")->where( 'path', '([A-z\d-\/_.]+)?' );*/


Route::get('invoice', function () {
    return view('invoice');
});

Route::get('/chats', 'ChatController@index');
Route::get('/messages', 'ChatController@fetchAllMessagesForAdmin');
Route::post('fetchMessage', 'ChatController@fetchAllMessages');
Route::post('messages', 'ChatController@sendMessage')->name('messages');
Route::post('sendRoutines', 'RoutineController@sendRequestedRoutine');
Route::post('routines', 'RoutineController@storeRoutine');
Route::post('myroutine', 'RoutineController@myRoutine');

Route::get('{path}',"HomeController@index")->where( 'path', '([A-z\d-\/_.]+)?' );
