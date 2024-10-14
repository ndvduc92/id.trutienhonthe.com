<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApiController;

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

Route::get('/update_char', [AuthController::class, 'updateCharApi'])->name("update_char");
Route::get('/update_vip', [AuthController::class, 'updateVip'])->name("update_vip");

Route::post('/payment/success', [ApiController::class, 'paymentSuccess'])->name("paymentSuccess");
Route::get('/update_guild', [ApiController::class, 'getGuilds'])->name("getGuilds");

Route::get('/update_name', [AuthController::class, 'updateNameApi'])->name("updateNameApi");
Route::get('/name_change', [AuthController::class, 'nameChange'])->name("nameChange");
Route::get('/bot', [AuthController::class, 'bot'])->name("bot");
Route::get('/cache', [AuthController::class, 'cache'])->name("cache");


Route::get('/chars', [ApiController::class, 'chars'])->name("chars");
