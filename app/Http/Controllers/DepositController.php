<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Promotion;
use Carbon\Carbon;
use Auth;

class DepositController extends Controller
{
    public function histories()
    {
        $histories = Deposit::where("user_id", Auth::user()->id)->latest()->get();
        return view("deposit_history", ["histories" => $histories]);
    }

    public function getNapTien()
    {
        $now = Carbon::now();
        $currentPromotion = Promotion::where('start_time', '<=', $now)->where('end_time', '>=', $now)->first();
        $img = "https://img.vietqr.io/image/mbbank-ZhuxianAoC-compact2.jpg?addInfo=AOC" . strtoupper(Auth::user()->username) . "&accountName=NGUYEN%20THI%20THUY%20TRANG";
        return view("deposit", ["currentPromotion" => $currentPromotion, "img" => $img]);
    }
}
