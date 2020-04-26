<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    protected $fillable = ['game_id', 'command', 'x', 'y', 'direction'];

    /*
     * Save command.
     */
    public function saveCommand($data = array()) {
        if(empty($data)) {
            return ['error' => 'Please provide input.'];
        }

        $command = Command::create($data);

        if(!isset($command['id'])) {
            return ['error' => 'Command not saved.'];
        }

        unset($command['updated_at']);
        unset($command['created_at']);

        return $command;
    }

}
