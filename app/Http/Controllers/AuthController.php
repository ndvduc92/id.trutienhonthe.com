<?php

namespace App\Http\Controllers;

use App\Models\Char;
use App\Models\Exchange;
use App\Models\User;
use Auth;
use DB;
use Illuminate\Http\Request;

class AuthController extends Controller
{
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

    public function signupPost(Request $request)
    {
        $validated = $request->validate([
            'login' => 'bail|required|min:4|max:10|alpha_num|unique:users,username',
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
            if (\Auth::user()->role != "member") {
                \Auth::logout();
                return redirect()->back()->with('error', 'Thông tin đăng nhập không chính xác');
            }
            try {
                $user = Auth::user();
                $response = $this->callGameApi("get", "/html/vip.php", []);
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

    public function setMainChar()
    {
        $user = Auth::user();
        $user->main_id = request()->main_id;
        $user->save();
        return back();
    }

    public function setMainCharHome($id)
    {
        $user = Auth::user();
        $user->main_id = $id;
        $user->save();
        return back();
    }

    public function updateChar()
    {
        $this->charUpdate();
        $this->setOnline();
        return back();
    }

    private function charUpdate()
    {
        $response = $this->callGameApi("get", "/html/char_update.php", []);
        $data = $response["data"];
        $chars = [];
        foreach ($data as $user) {
            $item = User::where("userid", $user["akkid"])->first();
            if (!$item->main_id) {
                $item->main_id = $user["id"];
                $item->save();
            }
            array_push($chars, [
                "userid" => $user["akkid"],
                "char_id" => $user["id"],
                "name" => $user["name"],
                "gender" => $user["gender"] == "0" ? "Nam" : "Nữ",
                "pk_value" => $user["pkvalue"],
                "class" => $user["occupation"],
                "level" => $user["level"],
                "reputation" => $user["reputation"],
                "pre_name" => $user["name"],
            ]);
        }
        Char::upsert($chars, ['char_id', 'userid'], ['name', "pk_value", "gender", "class", "level", "reputation"]);
        return $data;
    }

    public function updateCharApi()
    {
        $data = $this->charUpdate();
        $this->setOnline();
        return response()->json($data);
    }

    private function setOnline()
    {
        $response = $this->callGameApi("get", "/html/online1.php", []);
        $data = $response["data"];
        $onlines = collect($data)->pluck('ID')->all();
        User::whereIn('userid', $onlines)->update(['is_online' => true]);
        User::whereNotIn('userid', $onlines)->update(['is_online' => false]);
    }

    public function getPassword()
    {
        return view("password");
    }

    public function postPassword(Request $request)
    {
        $validated = $request->validate([
            'old' => 'bail|required',
            'new' => 'bail|required|min:4|max:10|alpha_num',
            'newcf' => 'bail|required|same:new',
        ], [
            "new.min" => "Mật khẩu chỉ được chứa từ 3 - 10 kí tự",
            "new.max" => "Mật khẩu chỉ được chứa từ 3 - 10 kí tự",
            "new.alpha_num" => "Mật khẩu chỉ được chứa chữ và số",
            "newcf.same" => "Mật khẩu xác thực không giống nhau",
        ]);
        $user = \Auth::user();
        if ($request->old == $user->password2) {
            try {
                DB::beginTransaction();
                $this->callGameApi("POST", "/html/passwdapi.php", [
                    "login" => $user->username,
                    "passwd" => $request->new,
                ]);
                $user->password2 = $request->new;
                $user->password = \Hash::make($request->new);
                $user->change_pass = $user->change_pass + 1;
                $user->save();
                DB::commit();
                return back()->with("success", "Đổi mật khẩu thành công!");
            } catch (\Throwable $th) {
                DB::rollback();
                return back()->with("error", "Đã có lỗi xảy ra, vui lòng liên hệ với GM!");
            }
        }
        return back()->with("error", "Mật khẩu hiện tại không đúng!");
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
        $this->callGameApi("post", "/html/send2.php", [
            "receiver" => $id,
            "itemid" => request()->class,
            "count" => 1,
        ]);
        $user->balance = intval($user->balance) - 100000;
        $user->save();
        return back()->with("success", "Yêu cầu thành công!");
    }

    public function updateNameApi()
    {
        $chars = Char::all();
        $chars = collect($chars)->filter(function ($value) {
            return $value->name2 == "" && $this->specialChars($value->name);
        })->values();
        if (count($chars) > 0) {
            return 1;
            $this->sendMessage("Có nhân vật cần update tên tiếng Việt ! https://admin.trutien.vn");
        }
        return $chars;
    }

    public function bot()
    {
        return response()->json("ok", 409);
    }

    public function cache()
    {
        \Artisan::call('clear-compiled');
        return "ok";
    }

    private function specialChars($str)
    {
        return preg_match('/[^a-zA-Z0-9\.]/', $str) > 0;
    }

    public function buyChat(Request $request)
    {
        $user = Auth::user();
        $cash = $request->count * 100;
        if ($user->balance < $cash) {
            return back()->with("error", "Số xu trong tài khoản không đủ!");
        }
        $user->chat_count = $user->chat_count + $request->count;
        $user->balance = $user->balance - $cash;
        $user->save();
        return back()->with("success", "Đã mua lượt chat thành công!");
    }

    public function postChat(Request $request)
    {
        $user = Auth::user();
        if ($user->viplevel < 6) {
            if ($user->chat_count == 0) {
                return back()->with("error", "Đã hết số lượt chat, vui lòng mua thêm!");
            }
        }
        if (!$user->is_online) {
            return back()->with("error", "Chỉ tham gia vào cuộc trò chuyện được khi tài khoản đang online trong game!");
        }
        sleep(2);
        $this->callGameApi("POST", "/html/admin/broadcast.php", [
            "user" => Auth::user()->main_id,
            "message" => $request->msg,
            "chan" => 1,
        ]);
        if ($user->viplevel < 6) {
            $user->chat_count = $user->chat_count - 1;
            $user->save();
        }
        return back();
    }

    public function updateVip()
    {
        try {
            $response = $this->callGameApi("get", "/html/vip.php", []);
            $data = $response["data"];
            foreach ($data as $value) {
                $user = User::where("userid", $value["userid"])->first();
                if ($user) {
                    $user->viplevel = $value["viplevel"];
                    $user->save();
                }
            }
            return $data;
        } catch (\Throwable $th) {
            throw $th;
            return view("vip", ["vips" => []]);
        }
    }

    public function getExchange()
    {
        $histories = Exchange::where("from_user_id", Auth::user()->id)->orWhere("to_user_id", Auth::user()->id)->latest()->get();
        return view("exchange", ["histories" => $histories]);
    }

    public function postExchange()
    {
        $amount = request()->balance;
        $amount_fee = $amount + $amount * 0.1;
        $username = request()->username;

        $user_from = Auth::user();
        $user_to = User::where("username", $username)->first();

        if (!$user_to) {
            return back()->with("error", "Tài khoản không tồn tại!");
        }
        if ($user_from->id == $user_to->id) {
            return back()->with("error", "Bạn không thể chuyển xu cho chính mình!");
        }

        if ($amount < 50000) {
            return back()->with("error", "Mỗi lần chuyển tối thiểu là 50000 xu!");
        }
        if ($user_from->balance < $amount_fee) {
            return back()->with("error", "Số xu trong tài khoản không đủ!");
        }
        try {
            DB::beginTransaction();
            $user_from->balance = $user_from->balance - $amount_fee;
            $user_from->save();
            $user_to->balance = $user_to->balance + $amount;
            $user_to->save();

            $exchange = new Exchange;
            $exchange->from_user_id = $user_from->id;
            $exchange->to_user_id = $user_to->id;
            $exchange->amount = $amount;
            $exchange->save();
            DB::commit();
            return back()->with("success", "Đã chuyển xu thành công!");
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
            return back()->with("error", "Đã có lỗi xảy ra, vui lòng liên hệ với GM!");
        }
    }
}
