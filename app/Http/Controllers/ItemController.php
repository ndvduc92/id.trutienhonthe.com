<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $key = request()->key ?? null;
        $query = Item::query();
        if ($key) {
            $query = $query->where("itemid", 'like', '%' . $key . '%')->orWhere("name", 'like', '%' . $key . '%');
        }

        return view("items", ["items" => $query->paginate(20)]);
    }
}
