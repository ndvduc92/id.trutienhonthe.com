<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use hrace009\PerfectWorldAPI\API;
use hrace009\PerfectWorldAPI\Gamed;

class GameController extends Controller
{

    public function getOnlineList()
    {
        $gamed = new Gamed();
        $api = new API();
        return $api->getOnlineList();
    }
    /**
     * Display a listing of the resource.
     */
    public function isOnline($roleId)
    {
        $api = new API();
        return $api->checkRoleOnline($roleId);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function worldChat($role, $msg, $channel)
    {
        $api = new API();
        return $api->worldChat($role, $msg, $channel);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
