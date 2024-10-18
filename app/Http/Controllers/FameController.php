<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = $this->callGameApi("get", "/api/refine.php", []);
        $data = $response["data"];
        foreach($data as &$item) {
            $item["msg"] = "Người chơi [". getName($item['player']). "] đã luyện thành công trang bị lên cấp ".$item["level_after"];
        }
        return $data;
    }

    public function logging()
    {
        $response = $this->callGameApi("get", "/api/login.php", []);
        $data = $response["data"];
        foreach($data as &$item) {
            $type = $item["type"] == "rolelogin," ? "đăng nhập vào game" : "thoát khỏi trò chơi";
            $item["msg"] = "Người chơi [". getName($item['player']). "] vừa mới " . $type;
        }
        return $data;
    }

    public function boss()
    {
        $response = $this->callGameApi("get", "/api/boss.php", []);
        $data = $response["data"];
        foreach($data as &$item) {
            $item["msg"] = "Người chơi [". getName($item['player']). "] đã tiêu diệt Boss ".$item["bossid"];
        }
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
