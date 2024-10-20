<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Auth;

class TransactionController extends Controller
{
    public function transactions()
    {
        $shops = Transaction::where("user_id", Auth::user()->id)->where("type", "shop")->latest()->get();
        $knbs = Transaction::where("user_id", Auth::user()->id)->where("type", "knb")->latest()->get();
        return view("transactions", ["shops" => $shops, "knbs" => $knbs]);
    }
}
