<?php

use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UrlController::class, 'index']);
Route::get('/{url:unique_id}', [UrlController::class, 'redirectUrl']);
Route::get('/url/shorten/', [UrlController::class, 'show']);
Route::post('/url/shorten/', [UrlController::class, 'store']);
