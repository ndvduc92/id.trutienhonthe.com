<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Promotion;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Char;
use Auth;
use \Carbon\Carbon;
use hrace009\PerfectWorldAPI\API;

class HomeController extends Controller
{

    public function home()
    {
        $api = new API;
        //0: lân cận, 1: Thế giới, 2: Tổ đội, 3: Bang hội, 4: nói thầm, 9 quảng bá, 10 tin khác, 20: chúc tết
        $api->worldChat(1265, "Chúc các bạn chơi game vui vẻ", 9);
        // for ($i =0; $i < 10; $i++) {
        //     $api->worldChat(1265, "${i} Xin chào các bạn", $i);
        // }
        $user = Auth::user();
        $shops = Transaction::where("type", "shop")->latest()->limit(10)->get();
        return view('home', ["user" => $user, "shops" => $shops]);
    }

    public function getNapTien()
    {
        $now = Carbon::now();
        $currentPromotion = Promotion::where('start_time', '<=', $now)->where('end_time', '>=', $now)->first();
        $img = "https://img.vietqr.io/image/mbbank-ZhuxianAoC-compact2.jpg?addInfo=AOC" . strtoupper(Auth::user()->username) . "&accountName=NGUYEN%20THI%20THUY%20TRANG";
        return view("deposit", ["currentPromotion" => $currentPromotion, "img" => $img]);
    }

    public function transactions()
    {
        $shops = Transaction::where("user_id", Auth::user()->id)->where("type", "shop")->latest()->get();
        $knbs = Transaction::where("user_id", Auth::user()->id)->where("type", "knb")->latest()->get();
        return view("transactions", ["shops" => $shops, "knbs" => $knbs]);
    }

    public function online()
    {
        $api = new API;
        $response = $api->getOnlineList();
        $onlines = collect($response)->pluck('roleid')->all();
        $chars = Char::whereIn("char_id", $onlines)->get();
        return $chars;
    }
    

    public function vip()
    {
        try {
            $ignores = ["1040", "7024"];
            $response = $this->callGameApi("get", "/html/vip.php", []);
            $data = $response["data"];
            foreach ($data as $value) {
                $user = User::where("userid", $value["userid"])->first();
                if ($user) {
                    $user->viplevel = $value["viplevel"];
                    $user->save();
                }
            }
            $sorted = collect($data)->sortByDesc([
                ['viplevel', 'desc']
            ]);

            $sorted->values()->all();
            return view("vip", ["vips" => $sorted, "ignores" => $ignores]);
        } catch (\Throwable $th) {
            return view("vip", ["vips" => [], "ignores" => $ignores]);
        }
    }

    public function chat()
    {
        try {
            $smiles = $this->smiles();
            
            $response = $this->callGameApi("get", "/html/chats.php", []);
            $data = $response["data"];
            return view("chat", ["chat" => $data, "smiles" => $smiles]);
        } catch (\Throwable $th) {
            return view("chat", ["chat" => [], "smiles" => $smiles]);
        }
    }

    public function histories()
    {
        $histories = Deposit::where("user_id", Auth::user()->id)->latest()->get();
        return view("deposit_history", ["histories" => $histories]);
    }

    public function top()
    {
        $top = User::where("rank", ">", 0)->orderBy("rank", "DESC")->get();
        return view("top", ["top" => $top]);
    }
}
