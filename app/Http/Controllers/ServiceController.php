<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use hrace009\PerfectWorldAPI\API;
use App\Models\Char;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("services");
    }

    public function message()
    {
        $api = new API;
        if (strlen(request()->msg) > 200) {
            return back()->with("error", "Tin nhắn quá dài!");
        }

        if (!youOnline()) {
            return back()->with("error", "Người chơi đang không online!");
        }
        $api->worldChat(Auth::user()->main_id, "[Gửi từ Web]: ".request()->msg, 1);
        return back()->with("success", "Tin nhắn đã được gởi thành công");
    }

    public function checkOnline()
    {
        $char = Char::where("char_id", request()->char_id)->first();
        if (!$char) {
            return back()->with("error", "Nhân vật không tồn tại!");
        }
        $online = roleOnline(request()->char_id);
        if (!$online) {
            return back()->with("error", "Người chơi ".$char->name." đang không trực tuyến!");
        }
        return back()->with("success", "Người chơi ".$char->name." đang online!");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function quangBa($id)
    {
        $user = Auth::user();
        $role = $user->main_id;
        $message = request()->message;

        if ($user->balance >= 1000) {
            if (roleOnline($role)) {
                $api = new API();
                $typeX = $id == 1 ? 9 : 20;
                $price = $id == 1 ? 1000 : 5000;
                if ($api->worldChat($role, $message, $typeX)) {
                    $user->balance = $user->balance - $price;
                    $user->save();

                    $type = 'success';
                    $note = "Đã gửi thông báo thành công!";
                } else {
                    $type = 'error';
                    $note = "Máy chủ đang không hoạt động";
                }
            } else {
                $type = 'error';
                $note = "Nhân vật phải đang đăng nhập trong game!";
            }
        } else {
            $type = 'error';
            $note = "Số xu của bạn không đủ";
        }

        return redirect()->back()->with($type, $note);
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
