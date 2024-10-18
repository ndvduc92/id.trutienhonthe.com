<?php

namespace App\Http\Controllers;

use hrace009\PerfectWorldAPI\API;
use hrace009\PerfectWorldAPI\Gamed;
use App\Models\Faction;
use App\Models\Family;
use App\Models\FamilyUser;
use Illuminate\Support\Facades\DB;

class RankingController extends Controller
{
    public function handle()
    {
        $gamed = new Gamed();
        $api = new API();
        $handler = NULL;
        $factions = [];
        if ($api->online) {
            $raw_info = $api->getRaw('faction', $handler);
            foreach ($raw_info['Raw'] as $i => $iValue) {
                $pack = pack("H*", $iValue['value']);
                $faction = $gamed->unmarshal($pack, $api->data['FactionInfo']);
                array_push($factions, $faction);
            }
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
                    "master" => $faction_api[$key]["master"]
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
        $handler = NULL;
        $factions = [];
        if ($api->online) {
            $raw_info = $api->getRaw('family', $handler);
            foreach ($raw_info['Raw'] as $i => $iValue) {
                $pack = pack("H*", $iValue['value']);
                $faction = $gamed->unmarshal($pack, $api->data['FactionInfo']);
                array_push($factions, $faction);
            }
        }
        $faction_clean = [];
        foreach ($factions as $key => $faction) {
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
        DB::table("families")->truncate();
        Family::insert($families_res);
        return $faction_clean;
    }

    public function familyuser($data)
    {
        $users_res = [];
        foreach ($data as $key) {
            array_push($users_res, [
                "char_id" => $key["char_id"],
                "family_id" => $key["family_id"]
            ]);
        }
        DB::table("family_users")->truncate();
        FamilyUser::insert($users_res);
        return $data;
    }
}
