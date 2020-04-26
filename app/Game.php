<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /**
     * Get the commands for the game.
     */
    public function commands()
    {
        return $this->hasMany('App\Command');
    }

}
