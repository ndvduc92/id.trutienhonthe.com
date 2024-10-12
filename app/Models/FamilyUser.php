<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyUser extends Model
{
    use HasFactory;

    public function family() {
        return $this->belongsTo(Family::class, "id", "fid");
    }

    public function char() {
        return $this->belongsTo(Char::class, "id", "char_id");
    }
}
