<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WheelUser extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wheel_item()
    {
        return $this->belongsTo(WheelItem::class);
    }
}