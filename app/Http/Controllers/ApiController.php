<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Faction;
use App\Models\Family;
use App\Models\FamilyUser;
use App\Models\Promotion;
use App\Models\Trade;
use App\Models\TradeItem;
use App\Models\User;
use App\Services\CharService;
use App\Services\LoggingService;
use Carbon\Carbon;
use hrace009\PerfectWorldAPI\API;
use hrace009\PerfectWorldAPI\Gamed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function trades()
    {
        try {
            $response = $this->callGameApi("get", "/api/trades.php", []);
            $data = $response["data"];
            $trades = [];
            foreach ($data as $trade) {
                $params = [
                    "date" => $trade["time"],
                    "from_char_id" => $trade["from"],
                    "to_char_id" => $trade["to"],
                ];
                $item = Trade::where($params)->first();
                if (!$item) {
                    $newItemId = Trade::insertGetId($params);
                    foreach ($trade["items"] as &$m) {
                        $m["trade_id"] = $newItemId;
                    }
                    TradeItem::insert($trade["items"]);
                }
            }
            return "success";
        } catch (\Throwable $th) {
            return "error";
        }

    }

    public function loggings()
    {
    }

    public function updateVip()
    {
        try {
            $response = $this->callGameApi("get", "/api/vip.php", []);
            $data = $response["data"];
            foreach ($data as $value) {
                $user = User::where("userid", $value["userid"])->first();
                if ($user) {
                    $user->viplevel = $value["viplevel"];
                    $user->save();
                }
            }
            return $data;
        } catch (\Throwable $th) {
            throw $th;
            return view("vip", ["vips" => []]);
        }
    }

    public function paymentSuccess(Request $request)
    {
        try {
            $code = $request->code;
            $username = strtolower(substr($code, 3));
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

    private function getCurrentPromotion()
    {
        $now = Carbon::now();
        $currentPromotion = Promotion::where('start_time', '<=', $now)->where('end_time', '>=', $now)->first();
        return $currentPromotion;
    }

    public function chars()
    {
        if (!isOnline()) {
            return response()->json(["status" => "server-offline"], 400);
        }

        (new CharService())->chars();
        return response()->json(["status" => "success"], 200);

    }

    public function guilds()
    {
        if (!isOnline()) {
            return response()->json(["status" => "server-offline"], 400);
        }
        $gamed = new Gamed();
        $api = new API();
        $handler = null;
        $factions = [];
        $raw_info = $api->getRaw('faction', $handler);
        foreach ($raw_info['Raw'] as $i => $iValue) {
            $pack = pack("H*", $iValue['value']);
            $faction = $gamed->unmarshal($pack, $api->data['FactionInfo']);
            array_push($factions, $faction);
        }
        try {
            $response = $this->callGameApi("get", "/api/guild.php", []);
            $data = $response["data"];
            $faction_api = $data["faction"];
            $family_api = $data["family"];
            $familyuser_api = $data["familyuser"];
            $faction_clean = [];
            foreach ($factions as $key => $faction) {
                array_push($faction_clean, [
                    "id" => $faction["fid"],
                    "name" => $faction["name"],
                    "level" => $faction["level"],
                    "master" => $faction_api[$key]["master"],
                    "level" => $faction_api[$key]["level"],
                ]);
            }

            $guilds_res = [];
            foreach ($faction_clean as $key) {
                array_push($guilds_res, [
                    "id" => $key["id"],
                    "name" => $key["name"],
                    "level" => intval($key["level"]) + 1,
                    "master_id" => $key["master"],
                ]);
            }
            Faction::upsert($guilds_res, ['id'], ['name', "level", "master_id"]);
            $this->family($family_api);
            $this->familyuser($familyuser_api);
            return response()->json(["status" => "success"], 200);
        } catch (\Throwable $th) {
            throw $th;
            return response()->json(["status" => "error"], 400);
        }
    }

    public function family($data)
    {
        $gamed = new Gamed();
        $api = new API();
        $handler = null;
        $families = [];
        $raw_info = $api->getRaw('family', $handler);
        foreach ($raw_info['Raw'] as $i => $iValue) {
            $pack = pack("H*", $iValue['value']);
            $family = $gamed->unmarshal($pack, $api->data['FactionInfo']);
            array_push($families, $family);
        }
        $family_clean = [];
        foreach ($families as $key => $family) {
            array_push($family_clean, [
                "id" => $family["fid"],
                "name" => $family["name"],
                "faction_id" => $data[$key]["faction_id"],
                "master" => $data[$key]["master"],
            ]);
        }

        $families_res = [];
        foreach ($family_clean as $key) {
            array_push($families_res, [
                "id" => $key["id"],
                "name" => $key["name"],
                "faction_id" => $key["faction_id"],
                "master_id" => $key["master"],
            ]);
        }
        DB::table("families")->truncate();
        Family::insert($families_res);
        return $families_res;
    }

    public function familyuser($data)
    {
        $users_res = [];
        foreach ($data as $key) {
            array_push($users_res, [
                "char_id" => $key["char_id"],
                "family_id" => $key["family_id"],
            ]);
        }
        DB::table("family_users")->truncate();
        FamilyUser::insert($users_res);
        return $users_res;
    }

    public function refines()
    {
        $response = $this->callGameApi("get", "/api/refine.php", []);
        $data = $response["data"];
        (new LoggingService())->refine_logs($data);
        return "success";
    }

    public function logins()
    {
        $response = $this->callGameApi("get", "/api/login.php", []);
        $data = $response["data"];
        (new LoggingService())->login_logs($data);
        return "success";
    }

    public function boss()
    {
        $response = $this->callGameApi("get", "/api/boss.php", []);
        $data = $response["data"];
        (new LoggingService())->boss_logs($data);
        return "success";
    }

}
