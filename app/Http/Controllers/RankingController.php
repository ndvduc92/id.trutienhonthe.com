<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use hrace009\PerfectWorldAPI\API;
use hrace009\PerfectWorldAPI\Gamed;
use App\Models\Player;

class RankingController extends Controller
{
    protected function getFactionStat($fid, $stat, int $total = 0)
    {
        $players = Player::where('faction_id', $fid)->get();
        foreach ($players as $k => $v) {
            if ($v[$stat] > 0) {
                $total += $v[$stat];
            }
        }
        return $total;
    }

    public function handle()
    {
        $gamed = new Gamed();
        $api = new API();
        $handler = NULL;
        $clans = [];
        if ($api->online) {
            set_time_limit(0);
            do {
                $raw_info = $api->getRaw('faction', $handler);
                if (!isset($raw_info['Raw'])) {
                    break; 
                }
                if ( isset($raw_info['Raw']) || count($raw_info['Raw']) > 1) {
                   
                    foreach ($raw_info['Raw'] as $i => $iValue) {
                        if (empty($iValue['key']) || empty($iValue['value'])) {
                            unset($raw_info['Raw'][$i]);
                            continue;
                        }
                        $id = $gamed->getArrayValue(unpack("N", pack("H*", $iValue['key'])), 1);
                        $pack = pack("H*", $iValue['value']);
                        $faction = $gamed->unmarshal($pack, $api->data['FactionInfo']);
                        if (!empty($faction['master']['roleid']) && $faction['master']['roleid'] > 0) {
                            $user_faction = $api->getUserFaction($faction['master']['roleid']);
                            $faction_info = [
                                'id' => $faction['fid'],
                                'name' => $faction['name'],
                                'level' => $faction['level'] + 1,
                                'master' => $faction['master']['roleid'],
                                //'master_name' => $user_faction['name'],
                                'master_name' => "fdsfdsf",
                                'members' => count($faction['member']),
                                // 'reputation' => ($this->getFactionStat($faction['fid'], 'reputation') > 0) ? $this->getFactionStat($faction['fid'], 'reputation') : 0,
                                // 'time_used' => ($this->getFactionStat($faction['fid'], 'time_used') > 0) ? $this->getFactionStat($faction['fid'], 'time_used') : 0,
                                // 'pk_count' => ($this->getFactionStat($faction['fid'], 'pk_count') > 0) ? $this->getFactionStat($faction['fid'], 'pk_count') : 0,
                                'announce' => $faction['announce'],
                                //'territories' => Territories::where('owner', $faction['fid'])->count(),
                            ];

                            array_push($clans, $faction_info);

                            // if ($faction = Faction::find($faction_info['id'])) {
                            //     $faction->update($faction_info);
                            // } else {
                            //     Faction::create($faction_info);
                            // }
                        }
                        unset($id, $faction, $user_faction, $iValue['value']);
                    }
                    $raw_count = count($raw_info['Raw']) - 1;
                    $last_raw = $raw_info['Raw'][$raw_count];
                    $last_key = $last_raw['key'];
                    $new_key = hexdec($last_key) + 1;
                    $handler = bin2hex(pack("N*", $new_key));
                };
            } while (TRUE);
        }
        return $clans;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
