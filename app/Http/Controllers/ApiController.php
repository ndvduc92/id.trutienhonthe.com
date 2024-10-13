<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\User;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Clan;
use App\Models\Family;
use App\Models\FamilyUser;
use DB;
use Log;

class ApiController extends Controller
{
    public function paymentSuccess(Request $request)
    {
        try {
            $code = $request->code;
            $username = strtolower(substr($code, 2));
            $user = User::where("username", $username)->first();
            $amount = $request->transferAmount;
            $amount_promotion = $amount;
            $processing_time = $request->transactionDate;
            $bank = $request->gateway;

            $trans = new Deposit;
            $trans->user_id = $user->id ?? null;
            $trans->amount = $amount;
            $trans->status = "success";
            $trans->processing_time = $processing_time;

            $currentPromotion = $this->getCurrentPromotion();
            if ($currentPromotion) {
                if ($currentPromotion->type == "double") {
                    $amount_promotion = $amount_promotion * $currentPromotion->amount;
                } else {
                    $amount_promotion = $amount_promotion + $amount_promotion * $currentPromotion->amount / 100;
                }
            }
            $trans->amount_promotion = $amount_promotion;
            $user->balance = $user->balance + $amount_promotion;
            $trans->save();
            $user->save();
            $msg = "Người chơi " . $username . " đã nạp " . number_format($amount) . "";
            //$this->sendMessage($msg);

            return response()->json("ok", 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getGuilds() {
        $res = $this->callGuildApi("/html/guild.php");
        
        $handlex = preg_replace('#(").*?(")#', '', $res);
        // return $handlex;
        // $res = [];
        // foreach (mb_str_split($handlex) as $char) {
        //     if (mb_detect_encoding($char, "UTF-8", true)) {
        //         array_push($res, $char);
        //     }

        // }
        // $handlex = (implode("", $res));
        
        $parts = (explode("========\n", $handlex));
        
        $guilds = (explode("\n", $parts[0]));
        $guilds_res = [];
        foreach ($guilds as $key) {
            if ($key && !str_contains($key, 'Log::')) {
                $keys = explode(",", $key);
                if (count($keys) > 1) {
                    array_push($guilds_res, [
                        "guildid" => $keys[0],
                        "name" => $keys[1] ? $keys[1] : "Unknow",
                        "level" => $keys[2],
                        "char_id" => count($keys) == 5 ? $keys[2] :  $keys[3],
                        "size" => count($keys) == 5 ? $keys[4] :  $keys[5],
                    ]);

                }
            }
        }
        //return $guilds_res;
        Clan::upsert($guilds_res, ['guildid'], ['name', "level", "char_id", "size"]);
        $families = (explode("\n", $parts[1]));
        //return $families;

        $families_res = [];
        foreach ($families as $key) {
            if ($key && !str_contains($key, 'Log::')) {
                $keys = explode(",", $key);
                if ($keys[3] != "0") {
                    array_push($families_res, [
                        "fid" => $keys[0],
                        "name" => $keys[1] ? $keys[1] : "Unknow",
                        "char_id" => $keys[2],
                        "guildid" => $keys[3]
                    ]);
                }
                
            }
        }
        DB::table("families")->truncate();
        Family::insert($families_res);
        $users = (explode("\n", $parts[2]));

        $users_res = [];
        foreach ($users as $key) {
            if ($key && !str_contains($key, 'Log::')) {
                $keys = explode(",", $key);
                array_push($users_res, [
                    "char_id" => $keys[0],
                    "fid" => $keys[1],
                    "created_at" => date("Y-m-d H:i:s")
                ]);
            }
        }
        DB::table("family_users")->truncate();
        FamilyUser::insert($users_res);
        return response()->json($guilds_res, 200);
    }

    private function getCurrentPromotion()
    {
        $now = Carbon::now();
        $currentPromotion = Promotion::where('start_time', '<=', $now)->where('end_time', '>=', $now)->first();
        return $currentPromotion;
    }
}
