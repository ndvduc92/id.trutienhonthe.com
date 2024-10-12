<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Transaction;
use App\Models\User;
use Auth;
use DB;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function shopHistory()
    {
        $shops = Transaction::where("type", "shop")->latest()->get();
        return view('histories', ["shops" => $shops]);
    }

    public function getShop()
    {
        $shops = Shop::where("status", "active")->get();
        return view("shop", ["shops" => $shops]);
    }

    public function postShop(Request $request)
    {
        $user = Auth::user();
        if ($user->main_id == "") {
            return redirect()->back()->with('error', 'Chưa chọn nhân vật để mua vật phẩm.');
        }

        if ($request->quantity < 1) {
            return redirect()->back()->with('error', 'Số lượng không thể nhỏ hơn 1.');
        }

        $shop = Shop::find($request->shop_id);
        if ($request->quantity > $shop->stack) {
            return redirect()->back()->with('error', 'Số lượng không thể lớn hơn số lượng xếp chồng của vật phẩm.');
        }
        $balance = $user->balance;
        $cash = $request->quantity * $shop->price;
        if ($balance < $cash) {
            return redirect()->back()->with('error', 'Số xu trong tài khoản không đủ (cần ' . $cash . ' xu, thiếu ' . $cash - $balance . ' xu), vui lòng nạp thêm.');
        }
        try {
            DB::beginTransaction();
            $this->callGameApi("post", "/html/send2.php", [
                "receiver" => $user->main_id,
                "itemid" => $shop->itemid,
                "count" => $request->quantity,
            ]);
            $user->balance = $balance - $cash;
            $user->save();

            $transaction = new Transaction;
            $transaction->user_id = $user->id;
            $transaction->shop_quantity = $request->quantity;
            $transaction->shop_id = $request->shop_id;
            $transaction->type = "shop";
            $transaction->char_id = $user->main_id;
            $transaction->save();
            DB::commit();
            return back()->with('success', 'Chúc mừng bạn đã mua thành công ' . $request->quantity . ' cái ' . $shop->name . ' với giá ' . $cash . ' (xu)');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with("error", "Có lỗi xảy ra, vui lòng liên hệ GM!");
        }
    }
}
