<?php



/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Territories extends Model
{
    protected $fillable = ['id', 'level', 'owner', 'owner_name', 'occupy_time', 'challenger', 'challenger_name', 'deposit', 'cutoff_time', 'battle_time', 'bonus_time', 'color', 'status', 'timeout', 'max_bonus', 'challenge_time', 'challenger_details'];
}
