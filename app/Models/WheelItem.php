<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WheelItem extends Model
{
    use HasFactory;
    protected $appends = ['picture'];

    public function wheel()
    {
        return $this->belongsTo(Wheel::class);
    }

    public function getPictureAttribute()
    {
        return "https://id.trutienhonthe.com/icons/".$this->itemid.".png";
    }
}
