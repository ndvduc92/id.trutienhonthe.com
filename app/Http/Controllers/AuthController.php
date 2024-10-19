<?php

namespace App\Http\Controllers;

use App\Models\Char;
use App\Models\Exchange;
use App\Models\User;
use App\Models\Password;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Mail\ChangePassword;
use App\Mail\ForgotPassword;
use Illuminate\Support\Facades\Mail;

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

    public function passwordGet()
    {
        if (Auth::check()) {
            return redirect("/");
        }
        return view('forgot-password');
    }

    public function changeGet()
    {
        if (Auth::check()) {
            return redirect("/");
        }
        if (!request()->token) return view("forgot-password")->with("error", "Yêu cầu không hợp lệ");
        return view('forgot-password-change');
    }

    public function passwordPost()
    {
        if (Auth::check()) {
            return redirect("/");
        }
        $user = User::where("username", request()->login)->where("email2", request()->email)->first();
        if (!$user) return back()->with("error", "Tài khoản không tồn tại!");

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
        $link = "/quen-mat-khau/otp?token=".$token;
        return redirect($link)->with("success", "Vui lòng kiểm trả mail để lấy mã OTP");
    }

    public function changePost(Request $request)
    {
        $validated = $request->validate([
            'new' => 'bail|required|min:4|max:10|alpha_num',
            'newcf' => 'bail|required|same:new',
            'otp' => 'bail|required',
        ], [
            "new.min" => "Mật khẩu chỉ được chứa từ 3 - 10 kí tự",
            "new.max" => "Mật khẩu chỉ được chứa từ 3 - 10 kí tự",
            "new.alpha_num" => "Mật khẩu chỉ được chứa chữ và số",
            "newcf.same" => "Mật khẩu xác thực không giống nhau"
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
        for ($i = 0; $i < $length; ++ $i) {
            $pieces[] = $stringSpace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }

    public function chars()
    {		
        $GameServer = '103.57.221.103';	
        $GamedbPort = '29400';
        $GdeliverydPort = '29100';
        $GProviderPort = '29300';
        $GFactionPort = '29500';
        $UniquePort = '29401';
        $LogclientPort = '11101';


        function cuint($data)
        {
                if($data < 64)
                        return strrev(pack("C", $data));
                else if($data < 16384)
                        return strrev(pack("S", ($data | 0x8000)));
                else if($data < 536870912)
                        return strrev(pack("I", ($data | 0xC0000000)));
                return strrev(pack("c", -32) . pack("I", $data));
        }

		$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		if(!$sock)
		{
				die(socket_strerror(socket_last_error()));
		}
		if(socket_connect($sock, $GameServer, $GamedbPort))
		{
			socket_set_block($sock);

            
            $id_users = User::all();
            
            $players = [];
            foreach ($id_users as $id_user)
            {
                $data = cuint(3401)."\x08\x80\x00\x00\x01".pack("N", $id_user['userid']);
                $akkid = $id_user['userid'];
                $sbytes = socket_send($sock, $data, 8192, 0);
                $rbytes = socket_recv($sock, $buf, 8192, 0);

                $strlarge = unpack( "H", substr( $buf, 2, 1 ) );
                if(substr($strlarge[1], 0, 1) == "8")
                {
                    $start = 12;
                }
                else
                {
                    $start = 11;
                }
                $rolescount = unpack( "c", substr( $buf, $start, 1 ) );
                $start = $start+1;
                for($i = 0; $i<$rolescount[1]; $i++)
                {
                    $roleid = unpack( "N", substr( $buf, $start, 4 ) );
                    $start = $start+4;
                    $namelarge = unpack( "c*", substr( $buf, $start, 1 ) );
                    $start = $start+1;
                    $rolename = iconv( "UTF-16", "UTF-8", substr( $buf, $start, $namelarge[1] ) );
                    $start = $start+$namelarge[1];

                    //--RoleBase
                    $sock2 = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
                    socket_connect($sock2, $GameServer, $GamedbPort);
                    socket_set_block($sock2);
                    $data2 = cuint(3013)."\x08\x80\x00\x00\x01".strrev(pack("I",$roleid[1]));
                    socket_send($sock2, $data2, 8192, 0);
                    socket_recv($sock2, $buf_base, 8192, 0);
                    socket_set_nonblock($sock2);
                    socket_close($sock2);

                    $base_res = unpack("C12code/Cversion/Nid/Cname_len",$buf_base);
                    $name = "";
                    $buf_base = substr($buf_base,18);
                    $name = iconv("UCS-2LE", "UTF-8", substr($buf_base,0,$base_res['name_len']));
                    $buf_base = substr($buf_base,$base_res['name_len']);
                    $base_res2 = unpack("Cfaceid/Chairid/Cgender/Cstatus",$buf_base);
                    //--RoleBase

                    //--RoleStatus
                    $sock3 = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
                    socket_connect($sock3, $GameServer, $GamedbPort);
                    socket_set_block($sock3);
                    $data3 = cuint(3015)."\x08\x80\x00\x00\x01".strrev(pack("I",$roleid[1]));
                    socket_send($sock3, $data3, 8192, 0);
                    socket_recv($sock3, $buf_status, 8192, 0);
                    socket_set_nonblock($sock3);
                    socket_close($sock3);

                    $base_status = unpack("Ncuint/Nlocalsid/Nretcode/Cversion/Nid/Coccupation/nlevel/ncur_title/Nexp1/Nexp2/Npp/Nhp/Nmp",$buf_status);
                    $buf_status = substr($buf_status,42);
                    $posx = unpack("fx",strrev(substr($buf_status,0,4)));
                    $buf_status = substr($buf_status,4);
                    $posy = unpack("fy",strrev(substr($buf_status,0,4)));
                    $buf_status = substr($buf_status,4);
                    $posz = unpack("fz",strrev(substr($buf_status,0,4)));
                    $buf_status = substr($buf_status,4);
                    $base_status2 = unpack("Npkvalue/Nworldtag/Ntime_used/Nreputation/Nproduceskill/Nproduceexp",$buf_status);
                    //--RoleStatus

                    $version = $base_res['version'];
                    $id = $base_res['id'];
                    $name = $name;
                    $gender = $base_res2['gender'];
                    $status = $base_res2['status'];
                    $level = $base_status['level'];
                    $exp = $base_status['exp1'];
                    $occupation = $base_status['occupation'];
                    $pp = $base_status['pp'];
                    $hp = $base_status['hp'];
                    $mp = $base_status['mp'];
                    $posx = $posx['x'];
                    $posy = $posy['y'];
                    $posz = $posz['z'];
                    $pkvalue = $base_status2['pkvalue'];
                    $worldtag = $base_status2['worldtag'];
                    $reputation = $base_status2['reputation'];

                    $player;
                    $player["version"] = $version;
                    $player["akkid"] = $akkid;
                    $player["id"] = $id;
                    $player["name"] = $name;
                    $player["gender"] = $gender;
                    $player["occupation"] = $occupation;
                    $player["status"] = $status;
                    $player["level"] = $level;
                    $player["exp"] = $exp;
                    $player["pp"] = $pp;
                    $player["hp"] = $hp;
                    $player["mp"] = $mp;
                    $player["posx"] = $posx;
                    $player["posy"] = $posy;
                    $player["posz"] = $posz;
                    $player["pkvalue"] = $pkvalue;
                    $player["worldtag"] = $worldtag;
                    $player["reputation"] = $reputation;

                    array_push($players, $player);
                }

            }
			socket_set_nonblock($sock);
			socket_close($sock);
		}
		else
		{
			die(socket_strerror(socket_last_error()));
		}

        $chars = [];

        foreach ($players as $user) {
            $item = User::where("userid", $user["akkid"])->first();
            if ($item) {
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
                    "posx" => $user["posx"],
                    "posy" => $user["posy"],
                    "posz" => $user["posz"],
                    "worldtag" => $user["worldtag"],
                    "class" => $user["occupation"],
                    "level" => $user["level"],
                    "reputation" => $user["reputation"]
                ]);
            }
        }
        Char::upsert($chars, ['char_id', 'userid'], ['name', "pk_value", "gender", "class", "level", "reputation", "posx", "posy", "posz", "worldtag"]);
        return back();

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


    private function getOtp($n) { 
        $generator = "0123456789"; 
    
        $result = ""; 
      
        for ($i = 1; $i <= $n; $i++) { 
            $result .= substr($generator, (rand()%(strlen($generator))), 1); 
        } 
      
        return $result; 
    } 

    public function updateCharApi()
    {
        $data = $this->charUpdate();
        $this->setOnline();
        return response()->json($data);
    }

    public function getPassword()
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

    public function postPassword(Request $request)
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

    public function bot()
    {
        return response()->json("ok", 409);
    }

    public function cache()
    {
        \Artisan::call('clear-compiled');
        return "ok";
    }

    public function updateVip()
    {
        try {
            $response = $this->callGameApi("get", "/api/vip.php", []);
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
