<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faction extends Model
{
    use HasFactory;
    public $timestamps = true;

    public function families()
    {
        return $this->hasMany(Family::class);
    }

    public function master()
    {
        return $this->belongsTo(Char::class, "master_id", "char_id");
    }

    public function totalMember()
    {
        $sum = 0;
        foreach ($this->families as $item) {
            $sum += count($item->chars);
        }
        return $sum;
    }

    public function totalOnline()
    {
        $sum = 0;
        foreach ($this->families as $item) {
            $sum += $item->totalOnline();
        }
        return $sum;
    }
}
