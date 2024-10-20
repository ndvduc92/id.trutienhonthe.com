<?php

namespace App\Http\Controllers;

use App\Models\Giftcode;
use App\Models\GiftcodeOnlyUser;
use App\Models\GiftcodeUser;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class GiftcodeController extends Controller
{

    public function getGiftcode()
    {
        $user = Auth::user();
        $code_all = Giftcode::where("type", "all")->whereDate('expired', '>=', Carbon::now())->pluck("id")->toArray();
        $only_users = GiftcodeOnlyUser::where("user_id", $user->id)->pluck("giftcode_id")->toArray();
        $total = array_merge($code_all, $only_users);
        $code_vip = Giftcode::where("type", "vip")->where("viplevel", "<=", $user->viplevel)->pluck("id")->toArray();
        $all = array_merge($total, $code_vip);
        $giftcodes = Giftcode::with("items")->whereIn("id", $all)->get();
        return view("giftcodes", ["giftcodes" => $giftcodes]);
    }

    public function useGiftcode(Request $request, $id)
    {
        $user = Auth::user();
        if (!$user->main_id) {
            return back()->with("error", "Vui lòng vào game tạo nhân vật!!");
        }
        $userGiftcode = GiftcodeUser::where(["char_id" => $user->main_id, "giftcode_id" => $id])->first();
        if ($userGiftcode) {
            return redirect()->back()->with('error', 'Bạn đã dùng giftcode này!');
        }
        try {
            DB::beginTransaction();
            $code = Giftcode::find($id);
            $use = new GiftcodeUser;
            $use->user_id = $user->id;
            $use->giftcode_id = $id;
            $use->char_id = $user->main_id;
            $use->save();
            $code->count = $code->count + 1;
            $code->save();

            foreach ($code->items as $item) {
                $this->callGameApi("post", "/api/mail.php", [
                    "receiver" => $user->main_id,
                    "itemid" => $item->itemid,
                    "count" => $item->quantity,
                    "proctype" => $item->bind,
                    "msg" => "Giftcode " . $code->giftcode,
                ]);
            }

            DB::commit();
            return back()->with("success", "Sử dụng giftcode thành công, vui lòng check tín sứ!");
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with("error", "Có lỗi xảy ra, vui lòng liên hệ GM!");
        }
    }
}
