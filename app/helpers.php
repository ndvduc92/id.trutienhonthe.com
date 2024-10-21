<?php
use hrace009\PerfectWorldAPI\API;

function getAcc($userid)
{
    $user = \App\Models\User::where("userid", $userid)->first();
    $username = $user->username ?? "";
    if ($username == "") {
        return "";
    }
    return substr($username, 0, 3) . "******";
}

function getChar($userid)
{
    $user = \App\Models\User::where("userid", $userid)->first();
    $username = $user->username ?? "";
    if ($username) {
        return $user->getMain();
    } else {
        return "Chưa tạo nhân vật";
    }
}

function getName($char)
{
    $char = \App\Models\Char::where("char_id", $char)->first();
    return $char ? $char->getName() : "Chưa cập nhật";
}

function getNv($char)
{
    $char = \App\Models\Char::where("char_id", $char)->first();
    return $char ?? null;
}

function timeAgo($time_ago)
{
    $time_ago = strtotime($time_ago);
    $cur_time = \Carbon\Carbon::now()->timestamp;
    $time_elapsed = $cur_time - $time_ago;
    $seconds = $time_elapsed;
    $minutes = round($time_elapsed / 60);
    $hours = round($time_elapsed / 3600);
    $days = round($time_elapsed / 86400);
    $weeks = round($time_elapsed / 604800);
    $months = round($time_elapsed / 2600640);
    $years = round($time_elapsed / 31207680);
    // Seconds
    $showDate = false;
    if ($seconds <= 60) {
        $msg = "$seconds " . 'giây trước';
    }
    //Minutes
    elseif ($minutes <= 60) {
        $msg = "$minutes " . 'phút trước';
    }
    //Hours
    elseif ($hours <= 24) {
        $msg = "$hours " . 'giờ trước';
    }
    //Days
    elseif ($days <= 7) {
        if ($days == 1) {
            $msg = 'Hôm qua';
        } else {
            $showDate = true;
            $msg = "$days " . 'ngày trước';
        }
    }
    //Weeks
    elseif ($weeks <= 4.3) {
        $showDate = true;
        $msg = "$weeks " . 'tuần trước';
    }
    //Months
    elseif ($months <= 12) {
        $showDate = true;
        $msg = "$months " . 'tháng trước';
    }
    //Years
    else {
        $showDate = true;
        $msg = "$years " . 'năm trước';
    }

    return [
        "showDate" => $showDate,
        "time" => $msg
    ];
}

function gameApi($method, $path, $params = null)
{
    $client = new \GuzzleHttp\Client();
    $gameApi = env('GAME_API_ENDPOINT', '');
    $response = $client->request($method, $gameApi . $path, ["form_params" => $params]);
    $response = json_decode($response->getBody()->getContents(), true);
    return $response;
}

function isOnline()
{
    $api = new API;
    if (!$api->online) {
      \DB::table("chats")->truncate();
    }
    return $api->online;
}

function youOnline()
{
    $api = new API;
    if (!Auth::user()->main_id) {
        return false;
    }

    return $api->checkRoleOnline(intval(Auth::user()->main_id));
}

function roleOnline($id)
{
    $api = new API;
    try {
        return $api->checkRoleOnline(intval($id));
    } catch (\Throwable $th) {
        return false;
    }

}

function getOnlineList()
{
    $api = new API;
    try {
        return $api->getOnlineList();
    } catch (\Throwable $th) {
        return [];
    }

}

function getItem($itemid)
{
    $item = \App\Models\Item::where("itemid", $itemid)->first();
    return $item ? $item->name : "Chưa cập nhật";
}

function getOnlines()
{
    try {
        $api = new API;
        $response = $api->getOnlineList();
        $onlines = collect($response)->pluck('roleid')->all();
        $chars = \App\Models\Char::whereIn("char_id", $onlines)->inRandomOrder()->limit(10)->get();
        return $chars;
    } catch (\Throwable $th) {
        return [];
    }
}
