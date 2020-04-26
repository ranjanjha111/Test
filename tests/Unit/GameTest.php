<?php

namespace Tests\Unit;

// use App\Game;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    /**
     * Test start game
     *
     * @return void
     */
    public function testStartGame()
    {
        $data = array(
            'command' => 'PLACE',
            'x' => 4,
            'y' => 4,
            'direction' => 'E'
        );

        $client = new \GuzzleHttp\Client();
        $response = $client->post("http://127.0.0.1:8000/api/games", ['form_params' => $data]);
        $this->assertEquals(201, $response->getStatusCode());
    }

    /**
     * Test Move
     *
     * @return void
     */
    public function testMove()
    {
        $data = array(
            'game_id' => 1,
            'command' => 'MOVE',
            'x' => 0,
            'y' => 1,
            'direction' => 'E'
        );

        $client = new \GuzzleHttp\Client();
        $response = $client->post("http://127.0.0.1:8000/api/games", ['form_params' => $data]);
        $this->assertEquals(201, $response->getStatusCode());
    }

    /**
     * Test Left
     *
     * @return void
     */
    public function testLeft()
    {
        $data = array(
            'game_id' => 1,
            'command' => 'LEFT',
            'x' => 0,
            'y' => 1,
            'direction' => 'N'
        );

        $client = new \GuzzleHttp\Client();
        $response = $client->post("http://127.0.0.1:8000/api/games", ['form_params' => $data]);
        $this->assertEquals(201, $response->getStatusCode());
    }

    /**
     * Test Right
     *
     * @return void
     */
    public function testRight()
    {
        $data = array(
            'game_id' => 1,
            'command' => 'RIGHT',
            'x' => 0,
            'y' => 1,
            'direction' => 'S'
        );

        $client = new \GuzzleHttp\Client();
        $response = $client->post("http://127.0.0.1:8000/api/games", ['form_params' => $data]);
        $this->assertEquals(201, $response->getStatusCode());
    }
}
