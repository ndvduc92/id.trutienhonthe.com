<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeItem extends Model
{
    use HasFactory;
    protected $appends = ['image'];

    protected $fillable = ['trade_id','itemid','quanity'];

    public function getImageAttribute()
    {
        return "https://id.trutienhonthe.com/icons/".$this->itemid.".png";
    }

    public function trade()
    {
        return $this->belongsTo(Trade::class, 'user_id');
    }

    public function item() {
        return $this->belongsTo(Item::class, 'itemid', 'itemid')->withDefault(["name" => "Không xác định"]);;
    }
}
