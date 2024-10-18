<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyUser extends Model
{
    use HasFactory;
    public $timestamps = true;

    public function family() {
        return $this->belongsTo(Family::class);
    }

    public function char() {
        return $this->belongsTo(Char::class, "char_id", "char_id");
    }
}
