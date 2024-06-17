<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index']);
Route::get('/get-data', [MainController::class, 'getData']);
Route::get('/export-data', [MainController::class, 'exportData']);
Route::get('/import-data', [MainController::class, 'importData']);