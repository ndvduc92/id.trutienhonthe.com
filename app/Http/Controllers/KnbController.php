<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Auth;
use DB;
use Illuminate\Http\Request;

class KnbController extends Controller
{

    public function getKnb()
    {
        return view("knb");
    }

    public function postKnb()
    {
        $ratio = 3;
        $user = Auth::user();
        $xu = request()->cash;
        if ($xu < 50000 || $xu > $user->balance) {
            return back()->with("error", "Số xu nạp phải lớn hơn 50000 và nhỏ hơn số dư xu hiện có!");
        }
        try {
            DB::beginTransaction();
            $this->callGameApi("POST", "/api/knb.php", [
                "userid" => $user->userid,
                "cash" => intval($xu / 10) * $ratio,
            ]);
            $user->balance = intval($user->balance) - $xu;
            $user->save();

            $transaction = new Transaction;
            $transaction->user_id = $user->id;
            $transaction->knb_amount = $xu;
            $transaction->type = "knb";
            $transaction->save();
            return back()->with("success", "Đã chuyển " . intval($xu / 1000) * $ratio . " KNB vào game thành công!");
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
            return back()->with("error", "Có lỗi xảy ra, vui lòng liên hệ GM!");
        }
    }
}
