<?php

namespace App\Http\Controllers;

use App\Models\Exchange;
use App\Models\User;
use Auth;
use DB;
use Illuminate\Http\Request;

class ExchangeController extends Controller
{

    public function getExchange()
    {
        $histories = Exchange::where("from_user_id", Auth::user()->id)->orWhere("to_user_id", Auth::user()->id)->latest()->get();
        return view("exchange", ["histories" => $histories]);
    }

    public function postExchange()
    {
        $amount = request()->balance;
        $amount_fee = $amount + $amount * 0.1;
        $username = request()->username;

        $user_from = Auth::user();
        $user_to = User::where("username", $username)->first();

        if (!$user_to) {
            return back()->with("error", "Tài khoản không tồn tại!");
        }
        if ($user_from->id == $user_to->id) {
            return back()->with("error", "Bạn không thể chuyển xu cho chính mình!");
        }

        if ($amount < 50000) {
            return back()->with("error", "Mỗi lần chuyển tối thiểu là 50000 xu!");
        }
        if ($user_from->balance < $amount_fee) {
            return back()->with("error", "Số xu trong tài khoản không đủ!");
        }
        try {
            DB::beginTransaction();
            $user_from->balance = $user_from->balance - $amount_fee;
            $user_from->save();
            $user_to->balance = $user_to->balance + $amount;
            $user_to->save();

            $exchange = new Exchange;
            $exchange->from_user_id = $user_from->id;
            $exchange->to_user_id = $user_to->id;
            $exchange->amount = $amount;
            $exchange->save();
            DB::commit();
            return back()->with("success", "Đã chuyển xu thành công!");
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
            return back()->with("error", "Đã có lỗi xảy ra, vui lòng liên hệ với GM!");
        }
    }
}
