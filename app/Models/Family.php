<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    public $timestamps = true;

    public function chars() {
        return $this->hasMany(FamilyUser::class);
    }

    public function faction() {
        return $this->belongsTo(Faction::class);
    }

    public function totalOnline() {
        $sum = 0;
        foreach($this->chars as $item) {
            if (roleOnline($item->char_id)) {
                $sum+= 1;
            }
        }
        return $sum;
    }
}
