<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuildController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\KnbController;
use App\Http\Controllers\GiftcodeController;
use App\Http\Controllers\RankingController;
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

Route::get('/dang-ky', [AuthController::class, 'signup']);
Route::get('/dang-nhap', [AuthController::class, 'signin'])->name("login");

Route::post('/dang-ky', [AuthController::class, 'signupPost']);
Route::post('/dang-nhap', [AuthController::class, 'signinPost']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'home'])->name("home");
    Route::get('/update_char', [AuthController::class, 'updateChar'])->name("update_char");
    Route::post('/set_main_char', [AuthController::class, 'setMainChar']);
    Route::get('/set_main_char/{id}', [AuthController::class, 'setMainCharHome']);
    Route::get('/doi-mon-phai/{id}', [AuthController::class, 'changeClassGet']);
    Route::post('/doi-mon-phai/{id}', [AuthController::class, 'changeClassPost']);
    Route::get('/logout', function () {
        Auth::logout();
        return redirect("/dang-nhap");
    });

    Route::get('/knb', [KnbController::class, 'getKnb'])->name("knb");
    Route::post('/knb', [KnbController::class, 'postKnb']);

    Route::get('/nap-tien', [HomeController::class, 'getNapTien'])->name("payment");
    Route::get('/lich-su-nap-tien', [HomeController::class, 'histories'])->name("histories");
    Route::get('/shops', [ShopController::class, 'getShop'])->name("shops");
    Route::post('/shops', [ShopController::class, 'postShop']);

    Route::get('/giftcodes', [GiftcodeController::class, 'getGiftCode'])->name("giftcodes");
    Route::get('/giftcodes/{id}/using', [GiftcodeController::class, 'useGiftCode']);
    Route::get('/transactions', [HomeController::class, 'transactions'])->name("transactions");

    Route::get('/doi-mat-khau', [AuthController::class, 'getPassword'])->name("password");
    Route::post('/doi-mat-khau', [AuthController::class, 'postPassword']);

    Route::get('/online', [HomeController::class, 'online'])->name("online");
    Route::get('/lich-su-mua', [ShopController::class, 'shopHistory'])->name("shopHistory");
    Route::get('/vip', [HomeController::class, 'vip'])->name("vip");
    Route::get('/top', [HomeController::class, 'top'])->name("top");
    Route::get('/chat', [HomeController::class, 'chat'])->name("chat");
    Route::post('/chat', [AuthController::class, 'postChat'])->name("postChat");
    Route::get('/bang-hoi', [GuildController::class, 'getGuild'])->name("guild");
    Route::post('/bang-hoi', [GuildController::class, 'postGuild'])->name("guild");
    Route::post('/buy/chat', [AuthController::class, 'buyChat']);

    Route::get('/rank', [RankingController::class, 'handle'])->name("guild");
    //Route::get('/online', [HomeController::class, 'online'])->name("online");
});
