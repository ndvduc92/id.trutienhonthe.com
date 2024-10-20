<?php

namespace App\Http\Controllers;

use App\Models\Char;
use App\Models\User;
use Auth;
use hrace009\PerfectWorldAPI\API;

class HomeController extends Controller
{

    public function home()
    {
        $user = Auth::user();
        return view('home', ["user" => $user]);
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
