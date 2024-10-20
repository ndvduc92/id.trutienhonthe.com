<?php

namespace App\Http\Controllers;

use App\Services\LoggingService;

class LoggingController extends Controller
{

    public function refines()
    {
        $response = $this->callGameApi("get", "/api/refine.php", []);
        $data = $response["data"];
        (new LoggingService())->refine_logs($data);
        return $data;
    }

    public function logins()
    {
        $response = $this->callGameApi("get", "/api/login.php", []);
        $data = $response["data"];
        (new LoggingService())->login_logs($data);
        return $data;
    }

    public function boss()
    {
        $response = $this->callGameApi("get", "/api/boss.php", []);
        $data = $response["data"];
        (new LoggingService())->boss_logs($data);
        return $data;
    }

    public function isBoss()
    {
        $allow = ["25949"];
        return $allow;
    }
}
