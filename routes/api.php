<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LeadController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('files', [FileController::class, 'index']);
Route::get('files/{file}', [FileController::class,'show']);
Route::get('files/download/{file}', [FileController::class, 'download']);
Route::get('download-last', [FileController::class, 'downloadLast']);
Route::get('files/last', [FileController::class, 'last']);
Route::post('leads', [LeadController::class, 'store']);

