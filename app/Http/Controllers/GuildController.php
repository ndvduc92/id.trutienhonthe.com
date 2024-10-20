<?php

namespace App\Http\Controllers;

use App\Models\Faction;
use App\Models\Family;
use App\Models\FamilyUser;
use App\Models\User;
use Auth;

class GuildController extends Controller
{
    public function getGuild()
    {
        $familyUser = FamilyUser::where("char_id", Auth::user()->main_id)->first();
        $users = [];
        $char_ids = [];
        $faction = null;
        try {
            if ($familyUser) {
                $family_id = $familyUser->family_id;
                $family_users = FamilyUser::where("family_id", $family_id)->get();
                $faction_id = Family::find($family_id)->faction_id;
                $faction = Faction::find($faction_id);
                $family_ids = Family::where("faction_id", $faction_id)->pluck("id");
                $users = FamilyUser::whereIn("family_id", $family_ids)->get();
                $char_ids = $users->pluck("char_id")->toArray();
            }
            return view("guild", ["guild" => $faction, "users" => $users, "fids" => $char_ids]);
        } catch (\Throwable $th) {
            return view("guild", ["guild" => null, "users" => $users, "fids" => $char_ids]);
        }
    }
}
