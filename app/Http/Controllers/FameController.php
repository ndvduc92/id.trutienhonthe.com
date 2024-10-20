<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FameController extends Controller
{

    private const BOSSES = [
        "25949" => "Tần Quảng",
    ];

    public function index()
    {
        $response = $this->callGameApi("get", "/api/refine.php", []);
        $data = $response["data"];

        $filtered = collect($data)->filter(function ($value, int $key) {
            return intval($value["level_after"]) > 11;
        });
        $filtered = $filtered->values()->all();
        foreach ($filtered as &$item) {
            $item["msg"] = "Người chơi [" . getName($item['player']) . "] đã luyện thành công trang bị [" . getItem($item['itemid']) . "] lên cấp " . $item["level_after"];
        }
        return $filtered;
    }

    public function logging()
    {
        $response = $this->callGameApi("get", "/api/login.php", []);
        $data = $response["data"];
        foreach ($data as &$item) {
            $type = $item["type"] == "rolelogin," ? "đăng nhập vào game" : "thoát khỏi trò chơi";
            $item["msg"] = "Người chơi [" . getName($item['player']) . "] vừa mới " . $type;
        }
        return $data;
    }

    public function boss()
    {
        $response = $this->callGameApi("get", "/api/boss.php", []);
        $data = $response["data"];

        $filtered = collect($data)->filter(function ($value, int $key) {
            return in_array($value["bossid"], $this->isBoss());
        });
        $boss = $filtered->values()->all();

        foreach ($boss as &$item) {
            $item["msg"] = "Người chơi [" . getName($item['player']) . "] đã tiêu diệt Boss [" . self::BOSSES[$item["bossid"]] . "]";
        }
        return $boss;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function isBoss()
    {
        $allow = ["25949"];
        return $allow;
    }
}
