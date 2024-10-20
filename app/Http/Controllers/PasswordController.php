<?php

namespace App\Http\Controllers;

use App\Mail\ChangePassword;
use App\Mail\ForgotPassword;
use App\Models\Password;
use App\Models\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{
    public function forgotPasswordGet()
    {
        if (Auth::check()) {
            return redirect("/");
        }
        return view('forgot-password');
    }

    public function forgotPasswordChangeGet()
    {
        if (Auth::check()) {
            return redirect("/");
        }
        if (!request()->token) {
            return view("forgot-password")->with("error", "Yêu cầu không hợp lệ");
        }

        return view('forgot-password-change');
    }

    public function forgotPasswordPost()
    {
        if (Auth::check()) {
            return redirect("/");
        }
        $user = User::where("username", request()->login)->where("email2", request()->email)->first();
        if (!$user) {
            return back()->with("error", "Tài khoản không tồn tại!");
        }

        $pass = Password::where("user_id", $user->id)->where("type", "forgot-password")->first();
        $token = $this->getRandomStringRandomInt(32);
        if ($pass) {
            $pass->otp = $this->getOtp(8);
            $pass->token = $token;
            $pass->expired = \Carbon\Carbon::now()->addMinutes(5)->format("Y-m-d H:i:s");
            $pass->save();
        } else {
            $pass = new Password;
            $pass->otp = $this->getOtp(8);
            $pass->type = "forgot-password";
            $pass->token = $token;
            $pass->user_id = $user->id;
            $pass->expired = \Carbon\Carbon::now()->addMinutes(5)->format("Y-m-d H:i:s");
            $pass->save();
        }
        Mail::to($user->email2)->send(new ForgotPassword($pass, $user));
        $link = "/quen-mat-khau/otp?token=" . $token;
        return redirect($link)->with("success", "Vui lòng kiểm trả mail để lấy mã OTP");
    }

    public function forgotPasswordChangePost(Request $request)
    {
        $validated = $request->validate([
            'new' => 'bail|required|min:4|max:10|alpha_num',
            'newcf' => 'bail|required|same:new',
            'otp' => 'bail|required',
        ], [
            "new.min" => "Mật khẩu chỉ được chứa từ 3 - 10 kí tự",
            "new.max" => "Mật khẩu chỉ được chứa từ 3 - 10 kí tự",
            "new.alpha_num" => "Mật khẩu chỉ được chứa chữ và số",
            "newcf.same" => "Mật khẩu xác thực không giống nhau",
        ]);

        $pass = Password::where("type", "forgot-password")->where("token", $request->token)->first();
        if ($pass) {
            $user = User::find($pass->user_id);
            if ($pass->otp != $request->otp || \Carbon\Carbon::now()->greaterThan($pass->expired)) {
                return back()->with("error", "Mã OTP không đúng hoặc hết hạn!");
            }
            try {
                DB::beginTransaction();
                $this->callGameApi("POST", "/api/passwd.php", [
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
        return back()->with("error", "Yêu cầu không hợp lệ!");
    }

    private function getRandomStringRandomInt($length = 32)
    {
        $stringSpace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pieces = [];
        $max = mb_strlen($stringSpace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces[] = $stringSpace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }

    private function getOtp($n)
    {
        $generator = "0123456789";

        $result = "";

        for ($i = 1; $i <= $n; $i++) {
            $result .= substr($generator, (rand() % (strlen($generator))), 1);
        }

        return $result;
    }

    public function getChangePassword()
    {
        return view("password");
    }

    public function sendOtp()
    {
        $pass = Password::where("user_id", Auth::user()->id)->where("type", "change-password")->first();
        if ($pass) {
            $pass->otp = $this->getOtp(8);
            $pass->expired = \Carbon\Carbon::now()->addMinutes(5)->format("Y-m-d H:i:s");
            $pass->save();
        } else {
            $pass = new Password;
            $pass->otp = $this->getOtp(8);
            $pass->type = "change-password";
            $pass->user_id = Auth::user()->id;
            $pass->expired = \Carbon\Carbon::now()->addMinutes(5)->format("Y-m-d H:i:s");
            $pass->save();
        }
        Mail::to(Auth::user()->email2)->send(new ChangePassword($pass, Auth::user()));
        return response()->json(null, 200);
    }

    public function postChangePassword(Request $request)
    {
        $validated = $request->validate([
            'old' => 'bail|required',
            'new' => 'bail|required|min:4|max:10|alpha_num',
            'newcf' => 'bail|required|same:new',
            'otp' => 'bail|required',
        ], [
            "new.min" => "Mật khẩu chỉ được chứa từ 3 - 10 kí tự",
            "new.max" => "Mật khẩu chỉ được chứa từ 3 - 10 kí tự",
            "new.alpha_num" => "Mật khẩu chỉ được chứa chữ và số",
            "newcf.same" => "Mật khẩu xác thực không giống nhau",
        ]);
        $user = \Auth::user();
        if ($request->old == $user->password2) {
            $pass = Password::where("user_id", Auth::user()->id)->where("otp", $request->otp)->first();
            if (!$pass || ($pass && \Carbon\Carbon::now()->greaterThan($pass->expired))) {
                return back()->with("error", "Mã OTP không đúng hoặc hết hạn!");
            }
            try {
                DB::beginTransaction();
                $this->callGameApi("POST", "/api/passwd.php", [
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
}
