<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Wheel;
use App\Models\WheelItem;
use App\Models\WheelUser;
use App\Models\User;
use \Carbon\Carbon;

class WheelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() 
    {
        return view("wheels", [
            "daily" => Wheel::find(1),
            "vip" => Wheel::find(2),
            "coin" => Wheel::find(3)
        ]);

    }

    public function show(Request $request, $id)
    {
        $wheel = Wheel::findOrFail($id);
        if ($wheel->viplevel && Auth::user()->viplevel < $wheel->viplevel) {
            return redirect("/vong-quay-may-man")->with('error', 'Yêu cầu phải VIP 5 trở lên để tham gia vòng quay này!');
        }
        $date =  date('Y-m-d');
        $first_day = date('Y-m-01', strtotime($date));
        $last_day = date('Y-m-t', strtotime($date));
        if (request()->ajax()) {
            $query = $this->getAll($id);
            if (!empty($request->start_date) && !empty($request->end_date)) {
                $start = $request->start_date;
                $end =  $request->end_date;
                $query->whereDate('wheel_users.created_at', '>=', $start)
                        ->whereDate('wheel_users.created_at', '<=', $end);
            }
            return DataTables::of($query)
                ->editColumn('created_at', function($row){
                    return $this->timeAgo($row->created_at);
                })
                ->rawColumns(['msg'])
                ->make(true);
        }
        $spin_name = [];
        $spins = $this->getSpin($id);
        foreach ($spins as $spin) {
            $spin_name[] = $spin->name;
        }
        return view('wheel', compact('spin_name', 'first_day', 'last_day', "wheel"));
    }

    public function getAll($id)
    {
        $items = Wheel::find($id)->items()->pluck("id")->toArray();
        return WheelUser::with("user")->where("user_id", Auth::user()->id)->whereIn("wheel_item_id", $items)->orderBy('created_at', 'desc');
    }

    public function getSpin($id)
    {
        return WheelItem::where("wheel_id", $id)->get();
    }

    public function getRandomWeightedElement($weightedValues)
    {
        $rand = mt_Rand(1, (int) array_sum($weightedValues));
        foreach ($weightedValues as $key => $value) {
            $rand -= $value;
            if ($rand <= 0) {
                return $key;
            }
        }
    }

    public function store($content, $id, $wheel_id)
    {
        $spin_history = new WheelUser();
        $spin_history->msg = $content;
        $spin_history->user_id = \Auth::user()->id;
        $spin_history->wheel_item_id = $id;
        $spin_history->save();

        $wheel = Wheel::find($wheel_id);
        if ($wheel->coin_amount != 0) {
            $user = Auth::user();
            $user->balance = $user->balance - $wheel->coin_amount;
            $user->save();
        }

        $item = WheelItem::find($id);
        $this->callGameApi("post", "/api/mail.php", [
            "receiver" => Auth::user()->main_id,
            "itemid" => $item->itemid,
            "count" => $item->quantity,
            "proctype"=> $item->bind,
            "msg" => $wheel->name
        ]);

    }

    public function timeAgo($time_ago)
    {
        $time_ago   = strtotime($time_ago);
        $cur_time   = Carbon::now()->timestamp;
        $time_elapsed   = $cur_time - $time_ago;
        $seconds    = $time_elapsed ;
        $minutes    = round($time_elapsed / 60);
        $hours      = round($time_elapsed / 3600);
        $days       = round($time_elapsed / 86400);
        $weeks      = round($time_elapsed / 604800);
        $months     = round($time_elapsed / 2600640);
        $years      = round($time_elapsed / 31207680);
        // Seconds
        if ($seconds <= 60) {
            return "$seconds ".'giây trước';
        }
        //Minutes
        elseif ($minutes <= 60) {
            return "$minutes ".'phút trước';
        }
        //Hours
        elseif ($hours <= 24) {
            return "$hours ".'giờ trước';
        }
        //Days
        elseif ($days <= 7) {
            if ($days == 1) {
                return 'Hôm qua';
            } else {
                return "$days ".'ngày trước';
            }
        }
        //Weeks
        elseif ($weeks <= 4.3) {
            return "$weeks ".'tuần trước';
        }
        //Months
        elseif ($months <= 12) {
            return "$months ".'tháng trước';
        }
        //Years
        else {
            return "$years ".'năm trước';
        }
    }


    public function checkLimit($id) 
    {
        $wheel = Wheel::find($id);
        $items = $wheel->items()->pluck("id")->toArray();
        $times = WheelUser::where("user_id", Auth::user()->id)->whereIn("wheel_item_id", $items)->whereDate('created_at', Carbon::today())->get();
        return count($times) >= $wheel->num_of_times;
    }

    public function checkVip($id) 
    {
        $wheel = Wheel::find($id);
        if (!$wheel->viplevel) {
            return true;
        }
        return Auth::user()->viplevel >= $wheel->viplevel;
    }

    public function postSpin(Request $request, $id)
    {
        $spins = $this->getSpin($id);
        if (count($spins) == 0) {
            return response()->json([
                'status' => 'error',
                'msg' => 'Không tồn tại giải thưởng'
            ]);
        }

        if ($this->checkLimit($id)) {
            return response()->json([
                'status' => 'error',
                'msg' => 'Số lần quay hôm nay đã hết!'
            ]);
        }

        if (!$this->checkVip($id)) {
            return response()->json([
                'status' => 'error',
                'msg' => 'Yêu cầu phải VIP 5 trở lên!'
            ]);
        }

        $label = [];
        $rate = [];
        $reward = [];
        $wheel_item = [];
        foreach ($spins as $spin) {
            $wheel_item[] = $spin->id;
            $label[] = $spin->name. " x".$spin->quantity;
            $rate[] = $spin->ratio;
            $reward[] = $spin->name;
        }
        $out = $this->getRandomWeightedElement($rate);
        $this->store($label[$out], $wheel_item[$out], $id);

        return response()->json([
            'status' => 'success',
            'location' => $out + 1,
            'msg' => $label[$out]
        ]);
    }
}
