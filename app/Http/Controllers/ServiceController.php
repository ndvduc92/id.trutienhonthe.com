<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use hrace009\PerfectWorldAPI\API;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("services");
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
