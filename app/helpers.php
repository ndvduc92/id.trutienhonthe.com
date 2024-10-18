<?php
use hrace009\PerfectWorldAPI\API;

function getAcc($userid) 
{
    $user = \App\Models\User::where("userid", $userid)->first();
    $username = $user->username ?? "";
    if ($username == "") {
      return "";
    }
    return substr($username,0, 3)."******";
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

function getNv($char) {
  $char = \App\Models\Char::where("char_id", $char)->first();
  return $char ?? null;
}

function gameApi($method, $path, $params=null) 
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
  return $api->online;
}


function youOnline() 
{
  $api = new API;
  if (!Auth::user()->main_id) return false;
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

function getOnlines() {
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
