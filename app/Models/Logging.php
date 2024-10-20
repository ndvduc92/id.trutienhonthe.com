<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logging extends Model
{
    use HasFactory;

    public const BOSSES = [
        "25949" => "Tần Quảng",
        "10671" => "Quỷ Điệp Vương",
    ];

    protected $appends = ['msg'];

    private function getBoss($bossid)
    {
        if (in_array(intval($bossid), array_keys(self::BOSSES))) {
            return self::BOSSES[$bossid];
        }
        return "Không xác định";
    }

    public function getMsgAttribute()
    {
        $msg = "";
        $type = $this->type;
        switch ($type) {
            case 'refine':
                $msg = "Người chơi <span class='highlight'>[" . ($this->char->name) . "]</span> đã luyện thành công trang bị <span class='highlight'>[" . $this->item->name . "]</span> lên cấp " . $this->refine_level_after;
                break;
            case 'login':
                $type = $type == "login" ? "đăng nhập vào game" : "thoát khỏi trò chơi";
                $msg = "Người chơi <span class='highlight'>[" . $this->char->name . "]</span> vừa mới " . $type;
                break;
            case 'boss':
                $msg = "Người chơi <span class='highlight'>[" . ($this->char->name) . "]</span> đã tiêu diệt Boss </span>[" . $this->getBoss($this->bossid) . "]</span>";
                break;
            default:
                $msg = "....";
                break;
        }
        return $msg;
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'itemid', 'itemid')->withDefault(["name" => "Không xác định"]);
    }

    public function stone()
    {
        return $this->belongsTo(Item::class, 'refine_stoneid', 'itemid')->withDefault(["name" => "Không xác định"]);
    }

    public function char()
    {
        return $this->belongsTo(Char::class, 'char_id', 'char_id');
    }
}
