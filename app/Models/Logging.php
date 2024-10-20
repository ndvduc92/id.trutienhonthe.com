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
