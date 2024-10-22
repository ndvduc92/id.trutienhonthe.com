<?php

namespace App\Http\Controllers;

use App\Models\Char;
use App\Models\Password;
use App\Models\User;
use App\Services\CharService;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function profile()
    {
        return view('profile');
    }

    public function signup()
    {
        if (Auth::check()) {
            return redirect("/");
        }
        return view('signup');
    }

    public function signin()
    {
        if (Auth::check()) {
            return redirect("/");
        }
        return view('signin');
    }

    public function chars()
    {
        if (!isOnline()) {
            return back()->with("error", "Server không hoạt động.");
        }
        (new CharService())->chars();
        return back()->with("success", "Cập nhật thành công");

    }

    public function signupPost(Request $request)
    {
        $validated = $request->validate([
            'login' => 'bail|required|min:3|max:10|alpha_num|unique:users,username',
            'passwd' => 'bail|required|min:4|max:10|alpha_num',
            'passwdConfirm' => 'bail|required|same:passwd',
            'email' => 'bail|required|email|unique:users,email',
        ], [
            "login.min" => "Tên đăng nhập chỉ được chứa từ 3 - 10 kí tự",
            "login.max" => "Tên đăng nhập chỉ được chứa từ 3 - 10 kí tự",
            "login.alpha_num" => "Tên đăng nhập chỉ được chứa chữ và số",
            "login.unique" => "Tên đăng nhập đã được sử dụng",
            "passwd.min" => "Mật khẩu chỉ được chứa từ 3 - 10 kí tự",
            "passwd.max" => "Mật khẩu chỉ được chứa từ 3 - 10 kí tự",
            "passwd.alpha_num" => "Mật khẩu chỉ được chứa chữ và số",
            "passwdConfirm.same" => "Mật khẩu nhập lại không đúng",
        ]);
        sleep(0.5);
        $gameEmail = $request->login . "." . time() . "@gmail.com";
        $content = $this->callGameApi("POST", "/api/reg.php", [
            "login" => strtolower($request->login),
            "passwd" => $request->passwd,
            "repasswd" => $request->passwd,
            "email" => $gameEmail,
        ]);
        if ($content["success"]) {
            $user = new User;
            $user->name = strtolower($request->login);
            $user->email2 = strtolower($request->email);
            $user->username = strtolower($request->login);
            $user->userid = $content["userid"];
            $user->email = $gameEmail;
            $user->password2 = $request->passwd;
            $user->phone = $request->phone;
            $user->password = \Hash::make($request->passwd);
            $user->email_verified_at = date("Y-m-d H:i:s");
            $user->save();
            //$this->sendMessage("Người chơi " . $request->login . " vừa đăng ký tài khoản");
            return back()->with("success", "Tạo tài khoản thành công!");
        } else {
            return back()->with("error", "Tên đăng nhập đã tồn tại!");
        }
    }

    public function signinPost(Request $request)
    {
        $validated = $request->validate([
            'login' => 'bail|required',
            'password' => 'bail|required',
        ], [
            "login.required" => "Tên đăng nhập chỉ được chứa từ 3 - 10 kí tự",
        ]);
        $login = [
            'username' => $request->login,
            'password' => $request->password,
        ];
        if (\Auth::attempt($login)) {
            try {
                $user = Auth::user();
                $response = $this->callGameApi("get", "/api/vip.php", []);
                $data = $response["data"];
                $vip = current(array_filter($data, function ($e) use ($user) {
                    return $e["userid"] == $user->userid;
                }));
                if ($vip) {
                    $user->viplevel = $vip["viplevel"];
                    $user->save();
                }
            } catch (\Throwable $th) {
            }
            return redirect('/');
        } else {
            return redirect()->back()->with('error', 'Thông tin đăng nhập không chính xác');
        }
    }

    public function setMainChar($id)
    {
        $user = Auth::user();
        $user->main_id = $id;
        $user->save();
        return back()->with("success", "Cập nhật thành công");
    }

    public function changeClassGet($id)
    {
        $char = Char::where("char_id", $id)->first();
        return view("class", ["char" => $char]);
    }

    public function changeClassPost($id)
    {
        if (request()->class < 100) {
            return back()->with("error", "Vui lòng chọn môn phái!");
        }
        $user = Auth::user();
        if ($user->balance < 100000) {
            return back()->with("error", "Số xu trong tài khoản không đủ!");
        }
        $char = Char::where("char_id", $id)->first();
        $this->callGameApi("post", "/api/mail.php", [
            "receiver" => $id,
            "itemid" => request()->class,
            "count" => 1,
        ]);
        $user->balance = intval($user->balance) - 100000;
        $user->save();
        return back()->with("success", "Yêu cầu thành công!");
    }

}
