<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    use HasFactory;

    public function from_user() {
        return $this->belongsTo(User::class, "from_user_id", "id");
    }

    public function to_user() {
        return $this->belongsTo(User::class, "to_user_id", "id");
    }
}
