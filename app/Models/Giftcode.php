<?php

namespace App\Models;

use App\Models\GiftcodeUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Giftcode extends Model
{
    use HasFactory;

    public const TYPES = [
        'account' => "Theo tài khoản",
        'all' => "Tất cả",
        'vip' => "VIP only"
    ];

    public function beUsedByUser()
    {
        $used = GiftcodeUser::where(["char_id" => Auth::user()->main_id, "giftcode_id" => $this->id])->first();
        return $used ? true : false;
    }

    public function items()
    {
        return $this->hasMany(GiftcodeItem::class);
    }


    public function users() {
        return $this->hasMany(GiftcodeUser::class);
    }

    public function only_users() {
        return $this->hasMany(GiftcodeOnlyUser::class);
    }
}
