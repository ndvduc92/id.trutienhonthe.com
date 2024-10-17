<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WheelItem extends Model
{
    use HasFactory;

    public function wheel()
    {
        return $this->belongsTo(Wheel::class);
    }
}
