<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use App\Models\Clan;
use App\Models\Family;
use App\Models\FamilyUser;

class GuildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getGuild()
    {
        $familyUser = FamilyUser::where("char_id", Auth::user()->main_id)->first();
        $clan = null;
        $users = [];
        $chat = [];
        $smiles = $this->smiles();
        $fids = [];
        if ($familyUser) {
            $fid = $familyUser->fid;
            $fusers = FamilyUser::where("fid", $fid)->get();
            $cid = Family::where("fid", $fid)->first()->guildid;
            $clan = Clan::where("guildid", $cid)->first();
            $families = Family::where("guildid", $cid)->pluck("fid");
            $users = FamilyUser::whereIn("fid", $families)->get();
            $fids = $fusers->pluck("char_id");
            try {
            
                $response = $this->callGameApi("get", "/html/chats.php", []);
                $chat = $response["data"];
                $filtered = collect($chat)->filter(function ($value, int $key) {
                    return $value["channel"] != "1";
                });
                 
                $chat = $filtered->values()->all();
            } catch (\Throwable $th) {
                $chat = [];
            }
            
        }
        $chs = [];
        $names = [];
        foreach ($fids as $id) {
            array_push($names, [
                "char_id" => $id,
                "name" => getName("$id")
            ]);
        }

        foreach (array_reverse($chat) as $ch) {
            if(collect($names)->firstWhere('char_id', $ch["char"])) {
               $ch["name"] = collect($names)->firstWhere('char_id', $ch["char"])["name"];
               array_push($chs, $ch);
            }
        }
        return view("guild", ["guild" => $clan, "users" => $users, "chs" => $chs, "smiles" => $smiles, "fids" => $fids]);
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
