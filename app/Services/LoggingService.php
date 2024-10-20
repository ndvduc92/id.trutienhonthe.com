<?php

namespace App\Services;

use App\Models\Logging;

class LoggingService
{
    public function __construct()
    {
        if (!isOnline()) {
            return false;
        }
    }

    public function refine_logs($data)
    {
        $refines = [];
        foreach ($data as $value) {
            array_push($refines, [
                "type" => "refine",
                "itemid" => $value['itemid'],
                "refine_stoneid" => $value["stone"],
                "date" => $value["time"],
                "char_id" => $value["player"],
                "refine_level_before" => $value["level_before"],
                "refine_level_after" => $value["level_after"],
            ]);
        }
        Logging::upsert(
            $refines,
            ['type', 'date', 'char_id'],
            ['refine_level_before', "refine_level_after", "refine_stoneid", "itemid"]
        );
    }

    public function login_logs($data)
    {
        $refines = [];
        foreach ($data as $value) {
            array_push($refines, [
                "type" => "login",
                "value" => rtrim(explode("role", $value["type"])[1], ","),
                "date" => $value["time"],
                "char_id" => $value["player"],
            ]);
        }
        Logging::upsert(
            $refines,
            ['char_id', 'type', 'date'],
            ['value']
        );
    }

    public function boss_logs($data)
    {
        $refines = [];
        foreach ($data as $value) {
            array_push($refines, [
                "type" => "boss",
                "date" => $value["time"],
                "bossid" => $value["bossid"],
                "char_id" => $value["player"],
            ]);
        }
        Logging::upsert(
            $refines,
            ['char_id', 'type', 'date'],
            ['bossid']
        );
    }

    public function trade()
    {

    }
}
