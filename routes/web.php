<?php

use App\Http\Controllers\FileAccessController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/read', FileAccessController::class.'@open')->name('file_read');
Route::get('/open','FileAccessController@open');

Route::get('/check','FileAccessController@open');