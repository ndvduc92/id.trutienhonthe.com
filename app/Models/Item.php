<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $appends = ['image'];

    public function getImageAttribute()
    {
        return "https://id.trutienhonthe.com/icons/".$this->itemid.".png";
    }
}
