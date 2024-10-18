<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\User;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Clan;
use App\Models\Char;
use App\Models\Family;
use App\Models\FamilyUser;
use DB;
use Log;

class ApiController extends Controller
{
    public function paymentSuccess(Request $request)
    {
        try {
            $code = $request->code;
            $username = strtolower(substr($code, 3));
            $user = User::where("username", $username)->first();
            $amount = $request->transferAmount;
            $amount_promotion = $amount;
            $processing_time = $request->transactionDate;
            $bank = $request->gateway;

            $trans = new Deposit;
            $trans->user_id = $user->id ?? null;
            $trans->amount = $amount;
            $trans->status = "success";
            $trans->processing_time = $processing_time;

            $currentPromotion = $this->getCurrentPromotion();
            if ($currentPromotion) {
                if ($currentPromotion->type == "double") {
                    $amount_promotion = $amount_promotion * $currentPromotion->amount;
                } else {
                    $amount_promotion = $amount_promotion + $amount_promotion * $currentPromotion->amount / 100;
                }
            }
            $trans->amount_promotion = $amount_promotion;
            $user->balance = $user->balance + $amount_promotion;
            $trans->save();
            $user->save();
            $msg = "Người chơi " . $username . " đã nạp " . number_format($amount) . "";
            //$this->sendMessage($msg);

            return response()->json("ok", 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private function getCurrentPromotion()
    {
        $now = Carbon::now();
        $currentPromotion = Promotion::where('start_time', '<=', $now)->where('end_time', '>=', $now)->first();
        return $currentPromotion;
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
        return response()->json(200);

    }

}
