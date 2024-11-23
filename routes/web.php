<?php

use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index',[
        'title' => 'Dashboard'
    ]);
});

Route::resource('pegawai',PegawaiController::class);
