<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use App\Models\WheelItem;
use App\Models\WheelUser;
use \Carbon\Carbon;

class Wheel extends Model
{

    public const TYPES = [
        'daily' => "Vòng quay hàng ngày",
        'vip' => "Vòng quay dành cho vip",
        'coin' => "Vòng quay tiêu xu"
    ];

    public function items()
    {
        return $this->hasMany(WheelItem::class);
    }

    public function usedTimes() {
        $items = $this->items()->pluck("id")->toArray();
        $times = WheelUser::where("user_id", \Auth::user()->id)->whereIn("wheel_item_id", $items)->whereDate('created_at', Carbon::today())->get();
        return count($times);
    }
}