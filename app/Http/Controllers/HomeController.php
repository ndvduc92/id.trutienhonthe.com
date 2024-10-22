<?php

namespace App\Http\Controllers;

use App\Models\Char;
use App\Models\Logging;
use hrace009\PerfectWorldAPI\API;

class HomeController extends Controller
{
    public function home()
    {
        $loggings = Logging::whereNot("type", "login")->orderByDesc("date")->limit(100)->get();

        foreach ($loggings as $key => $value) {
            if ($value["type"] == "refine" && intval($value["refine_level_after"]) < 14) {
                unset($loggings[$key]);
            }

            if ($value["type"] == "boss" && !in_array(($value["bossid"]), array_keys(Logging::BOSSES))) {
                unset($loggings[$key]);
            }
        }
        return view('home', ["loggings" => $loggings]);
    }

    public function online()
    {
        $api = new API;
        $response = $api->getOnlineList();
        $onlines = collect($response)->pluck('roleid')->all();
        $chars = Char::whereIn("char_id", $onlines)->get();
        return $chars;
    }
}
