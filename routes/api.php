<?php

use App\Http\Controllers\API\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('menu', [ApiController::class, 'menu']);
Route::get('news', [ApiController::class, 'news']);
Route::get('cari', [ApiController::class, 'cari']);

Route::get('stafahli', [ApiController::class, 'stafahli'])->name('api.stafahli');
Route::get('setda', [ApiController::class, 'stafahli'])->name('api.setda');
Route::get('kapalaopd', [ApiController::class, 'stafahli'])->name('api.kapalaopd');
Route::get('camat', [ApiController::class, 'stafahli'])->name('api.camat');