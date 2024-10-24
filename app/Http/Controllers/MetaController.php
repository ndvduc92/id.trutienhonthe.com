<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use App\Models\Password;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class MetaController extends Controller
{

    public function create()
    {
        return view('meta');
    }

    public function store()
    {
        $newAccount = User::where("username", request()->username)->where("password2", request()->password)->first();
        if (!$newAccount) {
            return back()->with("error", "Thông tin tài khoản phụ không chính xác");
        }

        // Kiểm tra tài khoản thêm vào có phải tài khoản chính của meta khác không
        $m1 = Meta::where("user_id", $newAccount->id)->first();
        if ($m1) {
            if (!Meta::where("user_id", $newAccount->id)->where("meta_user_id", Auth::user()->id)->first()) {
                $meta = new Meta;
                $meta->user_id = $newAccount->id;
                $meta->meta_user_id = Auth::user()->id;
                $meta->save();
            }
        }
        $m2 = Meta::where("meta_user_id", $newAccount->id)->first();
        if ($m2) {
            if (!Meta::where("meta_user_id", Auth::user()->id)->where("user_id", $m2->user_id)->first()) {
                $meta = new Meta;
                $meta->user_id = $m2->user_id;
                $meta->meta_user_id = Auth::user()->id;
                $meta->save();
            }
        }

        // Kiểm tra tài khoản HIỆN TẠI có phải tài khoản chính của meta không
        $m3 = Meta::where("user_id", Auth::user()->id)->first();
        if ($m3) {
            if (!Meta::where("meta_user_id", $newAccount->id)->where("user_id", Auth::user()->id)->first()) {
                $meta = new Meta;
                $meta->user_id = Auth::user()->id;
                $meta->meta_user_id = $newAccount->id;
                $meta->save();
            }
        }
        $m4 = Meta::where("meta_user_id", Auth::user()->id)->first();
        if ($m4) {
            if (!Meta::where("meta_user_id", Auth::user()->id)->where("user_id", $m4->user_id)->first()) {
                $meta = new Meta;
                $meta->user_id = $m4->user_id;
                $meta->meta_user_id = Auth::user()->id;
                $meta->save();
            }
        }
        return back()->with("success", "Cập nhật thành công");
    }

    public function login($id)
    {
        $users = meta()->pluck("id")->toArray();
        if (!in_array($id, $users)) {
            return back();
        }
        Auth::loginUsingId($id);
        return back();
    }

}
