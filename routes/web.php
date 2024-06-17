<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index']);
Route::get('/get-data', [MainController::class, 'getData']);
Route::get('/export-data', [MainController::class, 'exportData']);
Route::post('/import-data', [MainController::class, 'importData']);
Route::get('/clean-data', [MainController::class, 'cleanData']);
Route::get('/generate-data', [MainController::class, 'generateData']);