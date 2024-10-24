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
        $exist = User::where("username", request()->username)->where("password2", request()->password)->first();
        if ($exist) {
            if (Meta::where("user_id", $exist->id)->first()) {
                return back()->with("error", "Tài khoản đã thuộc Meta");
            }
            $main = Meta::where("user_id", Auth::user()->id)->first();
            if ($main) {
                if (!Meta::where("meta_user_id", $exist->id)->where("user_id", Auth::user()->id)->first()) {
                    $meta = new Meta;
                    $meta->user_id = Auth::user()->id;
                    $meta->meta_user_id = $exist->id;
                    $meta->save();
                }
            } else {
                $main1 = Meta::where("meta_user_id", Auth::user()->id)->first();
                if ($main1) {
                    if (!Meta::where("meta_user_id", $exist->id)->where("user_id", $main1->user_id)->first()) {
                        $meta = new Meta;
                        $meta->user_id = $main1->user_id;
                        $meta->meta_user_id = $exist->id;
                        $meta->save();
                    }
                }
            }
            return back()->with("success", "Cập nhật thành công");
        }
        return back()->with("error", "Thông tin tài khoản phụ không chính xác");
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
