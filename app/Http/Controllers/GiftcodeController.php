<?php

namespace App\Http\Controllers;

use App\Models\Giftcode;
use App\Models\GiftcodeUser;
use App\Models\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GiftcodeController extends Controller
{

    public function getGiftcode()
    {
        $giftcodes = Giftcode::whereDate('expired', '>=', Carbon::now())->get();
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

            if ($code->giftcode == "FREEKHAM8") {
                $ids = ["81816", "81822", "81828", "81834"];
                foreach ($ids as $it) {
                    $this->callGameApi("post", "/html/send2.php", [
                        "receiver" => $user->main_id,
                        "itemid" => $it,
                        "count" => 2,
                    ]);
                }
                
            
            }else if ($code->giftcode == "KHUON14X") {
                $ids = ["40649","40648","40650","40651","40990","40997","40995","40973","40974","40975","40976","40989","40996","40994","40991","43514","43516","43515","43517"];
                foreach ($ids as $it) {
                    $this->callGameApi("post", "/html/send2.php", [
                        "receiver" => $user->main_id,
                        "itemid" => $it,
                        "count" => 1,
                    ]);
                }
                

            } else {
                $this->callGameApi("post", "/html/send2.php", [
                    "receiver" => $user->main_id,
                    "itemid" => $code->itemid,
                    "count" => $code->quantity,
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
