<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ClearSessionController;

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
    return view('home');
});


Route::get('download', [DownloadController::class, 'index']);

Route::get('import', [ImportController::class, 'index']);

Route::get('export', [ExportController::class, 'index']);

Route::post('import', [ImportController::class, 'uploadFile']);

Route::post('export', [ExportController::class, 'exportFile']);

Route::post('clearSession', [ClearSessionController::class, 'index']);