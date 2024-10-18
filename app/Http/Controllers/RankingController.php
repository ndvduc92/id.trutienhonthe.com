<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use hrace009\PerfectWorldAPI\API;
use hrace009\PerfectWorldAPI\Gamed;
use App\Models\Faction;
use App\Models\Family;
use App\Models\FamilyUser;
use DB;

class RankingController extends Controller
{
    protected function getFactionStat($fid, $stat, int $total = 0)
    {
        $players = Player::where('faction_id', $fid)->get();
        foreach ($players as $k => $v) {
            if ($v[$stat] > 0) {
                $total += $v[$stat];
            }
        }
        return $total;
    }

    public function handle()
    {
        $gamed = new Gamed();
        $api = new API();
        $handler = NULL;
        $factions = [];
        if ($api->online) {
            $raw_info = $api->getRaw('faction', $handler);
            foreach ($raw_info['Raw'] as $i => $iValue) {
                $id = $gamed->getArrayValue(unpack("N", pack("H*", $iValue['key'])), 1);
                $pack = pack("H*", $iValue['value']);
                $faction = $gamed->unmarshal($pack, $api->data['FactionInfo']);
                array_push($factions, $faction);
            }
        }
        try {
            $response = $this->callGameApi("get", "/api/faction.php", []);
            $data = $response["data"];
            $faction_clean = [];
            foreach($factions as $key => $faction) {
                array_push($faction_clean, [
                    "id" => $faction["fid"],
                    "name" => $faction["name"],
                    "level" => $faction["level"],
                    "master" => $data[$key]["master"]
                ]);
            }

            $guilds_res = [];
            foreach ($faction_clean as $key) {
                array_push($guilds_res, [
                    "id" => $key["id"],
                    "name" => $key["name"],
                    "level" => $key["level"],
                    "master_id" => $key["master"]
                ]);
            }
            Faction::upsert($guilds_res, ['id'], ['name', "level", "master_id"]);
            $this->family();
            $this->familyuser();
            return response()->json("success", 200);
        } catch (\Throwable $th) {
            return response()->json("error", 400);
        }
    }



    public function family()
    {
        $gamed = new Gamed();
        $api = new API();
        $handler = NULL;
        $factions = [];
        if ($api->online) {
            $raw_info = $api->getRaw('family', $handler);
            foreach ($raw_info['Raw'] as $i => $iValue) {
                $id = $gamed->getArrayValue(unpack("N", pack("H*", $iValue['key'])), 1);
                $pack = pack("H*", $iValue['value']);
                $faction = $gamed->unmarshal($pack, $api->data['FactionInfo']);
                array_push($factions, $faction);
            }
        }
        $response = $this->callGameApi("get", "/api/family.php", []);
        $data = $response["data"];
        $faction_clean = [];
        foreach($factions as $key => $faction) {
            array_push($faction_clean, [
                "id" => $faction["fid"],
                "name" => $faction["name"],
                "faction_id" => $data[$key]["faction_id"],
                "master" => $data[$key]["master"]
            ]);
        }

        $families_res = [];
        foreach ($faction_clean as $key) {
            array_push($families_res, [
                "id" => $key["id"],
                "name" => $key["name"],
                "faction_id" => $key["faction_id"],
                "master_id" => $key["master"]
            ]);
        }
        \DB::table("families")->truncate();
        Family::insert($families_res);
        return $faction_clean;
    }

    public function familyuser() {
        $response = $this->callGameApi("get", "/api/familyuser.php", []);
        $data = $response["data"];
        $users_res = [];
        foreach ($data as $key) {
            array_push($users_res, [
                "char_id" => $key["char_id"],
                "family_id" => $key["family_id"]
            ]);
        }
        \DB::table("family_users")->truncate();
        FamilyUser::insert($users_res);
        return $data;
    }
}
