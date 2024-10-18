<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use App\Models\Faction;
use App\Models\Family;
use App\Models\FamilyUser;

class GuildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function chats() {
        $familyUser = FamilyUser::where("char_id", Auth::user()->main_id)->first();
        $users = [];
        $chats = [];
        $smiles = $this->smiles();
        $char_ids = [];
        $faction = null;
        if ($familyUser) {
            $family_id = $familyUser->family_id;
            $family_users = FamilyUser::where("family_id", $family_id)->get();
            $faction_id = Family::find($family_id)->faction_id;
            $faction = Faction::find($faction_id);
            $family_ids = Family::where("faction_id", $faction_id)->pluck("id");
            $users = FamilyUser::whereIn("family_id", $family_ids)->get();
            $char_ids = $users->pluck("char_id")->toArray(); 
        }
        try {
            
            $response = $this->callGameApi("get", "/api/chat.php", []);
            $chat = $response["data"];

            foreach($chat as &$item) {
                if ($item["channel"] == "Faction" && $item["type"] == "Family") {
                    $item["channel"] = "Family";
                }

                if ($item["channel"] == "Whisper" && $item["type"] == "Family") {
                    $item["channel"] = "Family";
                }

                if ($item["channel"] == "Whisper" && $item["type"] == "Guild") {
                    $item["channel"] = "Faction";
                }
                $item["msg"] = mb_substr($item["msg"], 0, -1);
            }
            
            $filtered = collect($chat)->filter(function ($value, int $key) {
                return $value["channel"] == "World" || in_array($value["type"], ["Guild", "Family", "World"]);
            });
             
            $chats = $filtered->values()->all();

            foreach($chats as &$item) {
                switch ($item["channel"]) {
                    case 'World':
                        $item["from"] = "Thế Giới";
                        $item["color"] = "yellow";
                        break;
                    case 'Faction':
                        $item["from"] = "Bang Hội";
                        $item["color"] = "cyan";
                        break;
                    case 'Family':
                        $item["from"] = "Gia Tộc";
                        $item["color"] = "rgb(118 169 250/var(--tw-text-opacity))";
                        break;
                    default:
                        $item["from"] = "Thế Giới";
                        $item["color"] = "yellow";
                        break;
                }
            }
        } catch (\Throwable $th) {
            $chats = [];
        }
        $chat = [];
        $chs = [];
        $names = [];
        foreach ($char_ids as $id) {
            array_push($names, [
                "char_id" => $id,
                "name" => getName("$id")
            ]);
        }



        foreach (array_reverse($chats) as $ch) {
            if ($ch["channel"] == "World") {
                array_push($chs, $ch);
            } else {
                if(collect($names)->firstWhere('char_id', $ch["uid"])) {
                    $ch["name"] = collect($names)->firstWhere('char_id', $ch["uid"])["name"];
                    array_push($chs, $ch);
                }
            }
        }
        return view("chats", ["chs" => $chs]);

    }
    public function getGuild()
    {
        $familyUser = FamilyUser::where("char_id", Auth::user()->main_id)->first();
        $users = [];
        $char_ids = [];
        $faction = null;
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
    }

    /**
     * Show the form for creating a new resource.
     */
    public function postGuild()
    {
        return back()->with("success", "Đã thêm, chờ xác nhận từ member");
        return back()->with("error", "Đã có lỗi xảy ra, vui lòng liên hệ với GM!");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
