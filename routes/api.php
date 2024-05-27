<?php

use App\Http\Controllers\API\ApiController;
use App\Http\Middleware\CorsMiddleware;
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

Route::middleware([CorsMiddleware::class])->group(function () {
    Route::get('personil', [ApiController::class, 'personil'])->name('api.personil');
    Route::get('getpersonil/{id}', [ApiController::class, 'getpersonil'])->name('api.getpersonil');
});
