<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;

    protected $fillable = ['date','from_char_id','to_char_id'];

    public function items()
    {
        return $this->hasMany(TradeItem::class);
    }

    public function from_char()
    {
        return $this->belongsTo(Char::class, "from_char_id", "char_id");
    }

    public function to_char()
    {
        return $this->belongsTo(Char::class, "to_char_id", "char_id");
    }
}
