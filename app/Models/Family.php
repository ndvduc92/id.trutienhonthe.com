<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    public function clan() {
        return $this->belongsTo(Clan::class, "id", "guildid");
    }


    public function getMembers() {
        return FamilyUser::where("fid", $this->fid)->get();
    }
}
