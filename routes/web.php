<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuildController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\KnbController;
use App\Http\Controllers\GiftcodeController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\RankingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagerSpinController;
use App\Http\Controllers\WheelController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FameController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ItemController;

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
Route::post('/dang-ky', [AuthController::class, 'signupPost']);

Route::post('/dang-nhap', [AuthController::class, 'signinPost']);
Route::get('/dang-nhap', [AuthController::class, 'signin'])->name("login");

Route::get('/quen-mat-khau', [AuthController::class, 'passwordGet']);
Route::post('/quen-mat-khau', [AuthController::class, 'passwordPost']);

Route::get('/quen-mat-khau/otp', [AuthController::class, 'changeGet']);
Route::post('/quen-mat-khau/otp', [AuthController::class, 'changePost']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'home'])->name("home");
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
    Route::post('/otp', [AuthController::class, 'sendOtp'])->name("otp");
    Route::post('/doi-mat-khau', [AuthController::class, 'postPassword']);

    Route::get('/online', [HomeController::class, 'online'])->name("online");
    Route::get('/lich-su-mua', [ShopController::class, 'shopHistory'])->name("shopHistory");
    Route::get('/vip', [HomeController::class, 'vip'])->name("vip");
    Route::get('/top', [HomeController::class, 'top'])->name("top");
    Route::get('/bang-hoi', [GuildController::class, 'getGuild'])->name("guild");
    Route::post('/bang-hoi', [GuildController::class, 'postGuild'])->name("guild");

    Route::get('/rank', [RankingController::class, 'handle'])->name("guild");
    //Route::get('/online', [HomeController::class, 'online'])->name("online");
    Route::get('/chars', [AuthController::class, 'chars'])->name("chars");



    Route::post('/post-wheel/{id}',[WheelController::class,'postWheelItem']);
    Route::get('/vong-quay-may-man',[WheelController::class,'index'])->name('spin');
    Route::get('/vong-quay-may-man/{id}',[WheelController::class,'show']);

    Route::get('/dich-vu-game',[ServiceController::class,'index'])->name('services');
    Route::post('/dich-vu-game/quang-ba/{id}',[ServiceController::class,'quangBa']);

    Route::post('/dich-vu-game/check-online',[ServiceController::class,'checkOnline']);

    Route::post('/message',[ServiceController::class,'message']);
    Route::get('/tro-chuyen', [GuildController::class, 'chats'])->name("chats");

    Route::get('/danh-vong', [FameController::class, 'index'])->name("fame");

    Route::get('/logging', [FameController::class, 'logging'])->name("logging");

    Route::get('/boss', [FameController::class, 'boss'])->name("boss");

    Route::get('/skills', [SkillController::class, 'index'])->name("skills");

    Route::get('/items', [ItemController::class, 'index'])->name("items");

});
