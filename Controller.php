<?php //Controller.php

final class Controller extends BaseController
{
    public function __construct()
    {

    }

    public function newGame()
    {
        $game = new Game();

        header("Content-type: application/json");
        $json = json_encode($game);

        echo $json;
        die();
    }

    public function checkAnswer(string $answer)
    {
        
    }
}