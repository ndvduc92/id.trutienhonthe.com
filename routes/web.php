<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\GiftcodeController;
use App\Http\Controllers\GuildController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\KnbController;
use App\Http\Controllers\LoggingController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\WheelController;
use App\Http\Controllers\TransactionController;
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
Route::post('/dang-ky', [AuthController::class, 'signupPost']);

Route::post('/dang-nhap', [AuthController::class, 'signinPost']);
Route::get('/dang-nhap', [AuthController::class, 'signin'])->name("login");

Route::get('/quen-mat-khau', [PasswordController::class, 'forgotPasswordGet']);
Route::post('/quen-mat-khau', [PasswordController::class, 'forgotPasswordPost']);

Route::get('/quen-mat-khau/otp', [PasswordController::class, 'forgotPasswordChangeGet']);
Route::post('/quen-mat-khau/otp', [PasswordController::class, 'forgotPasswordChangePost']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'home'])->name("home");
    Route::post('/set_main_char', [AuthController::class, 'setMainChar']);
    Route::get('/set_main_char/{id}', [AuthController::class, 'setMainCharHome']);

    Route::get('/ca-nhan', [AuthController::class, 'profile'])->name("profile");

    Route::group(['prefix' => 'doi-mon-phai'], function () {
        Route::get('/{id}', [AuthController::class, 'changeClassGet']);
        Route::post('/{id}', [AuthController::class, 'changeClassPost']);
    });

    Route::get('/logout', function () {
        Auth::logout();
        return redirect("/dang-nhap");
    });

    Route::group(['prefix' => 'knb'], function () {
        Route::get('/', [KnbController::class, 'getKnb'])->name("knb");
        Route::post('/', [KnbController::class, 'postKnb']);
    });

    Route::get('/nap-tien', [DepositController::class, 'getNapTien'])->name("payment");
    Route::get('/lich-su-nap-tien', [DepositController::class, 'histories'])->name("histories");

    Route::group(['prefix' => 'shops'], function () {
        Route::get('/', [ShopController::class, 'getShop'])->name("shops");
        Route::post('/', [ShopController::class, 'postShop']);
        Route::get('/lich-su-mua', [ShopController::class, 'shopHistory'])->name("shopHistory");
    });

    Route::group(['prefix' => 'giftcodes'], function () {
        Route::get('/', [GiftcodeController::class, 'getGiftCode'])->name("giftcodes");
        Route::get('/{id}/using', [GiftcodeController::class, 'useGiftCode']);
    });

    Route::get('/transactions', [TransactionController::class, 'transactions'])->name("transactions");

    Route::post('/otp', [PasswordController::class, 'sendOtp'])->name("otp");

    Route::group(['prefix' => '/doi-mat-khau'], function () {
        Route::get('/', [PasswordController::class, 'getChangePassword'])->name("password");
        Route::post('/', [PasswordController::class, 'postChangePassword']);
    });

    Route::get('/online', [HomeController::class, 'online'])->name("online");
    Route::group(['prefix' => '/bang-hoi'], function () {
        Route::get('/', [GuildController::class, 'getGuild'])->name("guild");
        Route::post('/', [GuildController::class, 'postGuild']);
    });

    Route::get('/chars', [AuthController::class, 'chars'])->name("chars");

    Route::post('/post-wheel/{id}', [WheelController::class, 'postWheelItem']);

    Route::group(['prefix' => 'vong-quay-may-man'], function () {
        Route::get('/', [WheelController::class, 'index'])->name('spin');
        Route::get('/{id}', [WheelController::class, 'show']);
    });

    Route::group(['prefix' => 'dich-vu-game'], function () {
        Route::get('/', [ServiceController::class, 'index'])->name('services');
        Route::post('/quang-ba/{id}', [ServiceController::class, 'quangBa']);
        Route::post('/check-online', [ServiceController::class, 'checkOnline']);
    });

    Route::post('/message', [ServiceController::class, 'message']);
    Route::get('/tro-chuyen', [ChatController::class, 'chats'])->name("chats");

    Route::get('/skills', [SkillController::class, 'index'])->name("skills");

    Route::get('/items', [ItemController::class, 'index'])->name("items");

    Route::controller(LoggingController::class)->group(function () {
        Route::get('/refines', 'refines')->name("refines");
        Route::get('/logins', 'logins')->name("logins");
        Route::get('/boss', 'boss')->name("boss");
    });

});
