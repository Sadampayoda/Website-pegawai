<?php

use App\Http\Controllers\api\PegawaiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('pegawai-data',PegawaiController::class);
