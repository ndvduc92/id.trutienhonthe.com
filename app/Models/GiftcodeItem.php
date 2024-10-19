<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftcodeItem extends Model
{
    use HasFactory;

    protected $appends = ['image'];

    public function giftcode()
    {
        return $this->belongsTo(Giftcode::class, 'user_id');
    }

    public function getImageAttribute()
    {
        return "https://id.trutienhonthe.com/icons/".$this->itemid.".png";
    }

    public function item() {
        return $this->belongsTo(Item::class, 'itemid', 'itemid')->withDefault(["name" => "Không xác định"]);;
    }
}
