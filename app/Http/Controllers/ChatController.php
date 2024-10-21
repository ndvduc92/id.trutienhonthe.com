<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Faction;
use App\Models\Family;
use App\Models\FamilyUser;
use App\Models\User;
use hrace009\PerfectWorldAPI\API;
use Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function replaceSmile($msg)
    {
        $msg = trim($msg);
        $msg = str_replace(["", "", ""], "", $msg);
        return str_replace($this->smiles(), "*Biểu cảm* ", $msg);
    }

    public function chats()
    {
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

            foreach ($chat as &$item) {
                if ($item["channel"] == "Faction" && $item["type"] == "Family") {
                    $item["channel"] = "Family";
                }

                if ($item["channel"] == "Whisper" && $item["type"] == "Family") {
                    $item["channel"] = "Family";
                }

                if ($item["channel"] == "Whisper" && $item["type"] == "Guild") {
                    $item["channel"] = "Faction";
                }
                if ($item["channel"] == "Trade" && $item["type"] == "Guild") {
                    $item["channel"] = "Faction";
                }
                $item["msg"] = $this->replaceSmile($item["msg"]);
            }

            $filtered = collect($chat)->filter(function ($value, int $key) {
                return $value["channel"] == "World" || in_array($value["type"], ["Guild", "Family", "World"]);
            });

            $chats = $filtered->values()->all();

            foreach ($chats as &$item) {
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
                "name" => getName("$id"),
            ]);
        }

        foreach (array_reverse($chats) as $ch) {
            if ($ch["channel"] == "World") {
                array_push($chs, $ch);
            } else {
                if (collect($names)->firstWhere('char_id', $ch["uid"])) {
                    $ch["name"] = collect($names)->firstWhere('char_id', $ch["uid"])["name"];
                    array_push($chs, $ch);
                }
            }
        }
        $chats = Chat::all()->toArray();
        $all = array_merge($chats, $chs);
        $sorted = collect($all)->sortByDesc('date');

        $sorted->values()->all();
        return view("chats", ["chs" => $sorted->values()->all()]);

    }

    public function message()
    {
        $api = new API;
        if (strlen(request()->msg) > 200) {
            return back()->with("error", "Tin nhắn quá dài!");
        }

        if (!youOnline()) {
            return back()->with("error", "Người chơi đang không online!");
        }
        $user = Auth::user();

        if ($user->viplevel < 6 && $user->balance < 50) {
            return back()->with("error", "Số xu không đủ để gởi tin nhắn");
        }

        $api->worldChat($user->main_id, "[Gửi từ Web]: " . request()->msg, 1);

        if ($user->viplevel < 7) {
            $user->balance = $user->balance - 50;
            $user->save();
        }

        $chat = new Chat;
        $chat->date = date("Y-m-d H:i:s");
        $chat->type = "Chat";
        $chat->uid = Auth::user()->main_id;
        $chat->channel = "World";
        $chat->dest = "1";
        $chat->msg = request()->msg;
        $chat->from = "Thế Giới";
        $chat->color = "yellow";
        $chat->save();

        return back()->with("success", "Tin nhắn đã được gởi thành công");
    }
}
