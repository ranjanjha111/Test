<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Command;

class GameController extends Controller
{
    const COMMAND_PLACE = 'PLACE';
    const COMMAND_MOVE  = 'MOVE';
    const COMMAND_LEFT  = 'LEFT';
    const COMMAND_RIGHT = 'RIGHT';

    public function index()
    {
        $game = Game::all();
        return response()->json($game, 200); 
    }
 
    public function show($id)
    {
        $game = Game::find($id);
        
        if(empty($game)) {
            return response()->json(['error' => 'Please provide game id.'], 400);
        }

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $req = $request->all();
        // return response()->json($req, 201);

        if(!isset($req['command'])) {
            return response()->json(['error' => 'Command not found. Please provide valid command.'], 400);
        }

        switch($req['command']) {
            case self::COMMAND_PLACE:
                $game = Game::create();
                $req['game_id'] = $game['id'];

                $command = new Command();
                $result  = $command->saveCommand($req);
                break;
            case self::COMMAND_MOVE:
            case self::COMMAND_LEFT:
            case self::COMMAND_RIGHT:
                $command = new Command();
                $result  = $command->saveCommand($req);
                break;
            default:
                $result['error'] = 'Invalid command. Please provide valid command.';
                break;
        }

        if(isset($result['error'])) {
            return response()->json($result, 400);
        }
        return response()->json($result, 201);
    }
}
