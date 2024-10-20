<?php

namespace App\Http\Controllers;

use App\Models\Char;
use App\Models\Logging;
use hrace009\PerfectWorldAPI\API;

class HomeController extends Controller
{
    public function home()
    {
        $loggings = Logging::orderByDesc("date")->limit(100)->get();
        
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
