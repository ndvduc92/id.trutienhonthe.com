<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $appends = ['picture'];

    public function getSell()
    {
        return Transaction::where("shop_id", $this->id)->sum("shop_quantity");
    }

    public function getPictureAttribute()
    {
        return "https://id.trutienhonthe.com/icons/".$this->itemid.".png";
    }

    public function item() {
        return $this->belongsTo(Item::class, 'itemid', 'itemid')->withDefault(["name" => "Không xác định"]);;
    }
}
