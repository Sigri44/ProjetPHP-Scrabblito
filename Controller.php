<?php //Controller.php

final class Controller extends BaseController
{
    public function __construct()
    {

    }

    public function newGame()
    {
        $game = new Game();

        // on renvoi du JSON
        header("Content-type: application/json");
        // Conversion en JSON
        $json = json_encode($game);

        echo $json;
        die();
    }

    public function checkAnswer(string $answer)
    {
        $foundWord = Database::findWord($answer);

        // on renvoi du JSON
        header("Content-type: application/json");
        // Conversion en JSON
        $json = json_encode($foundWord);

        echo $json;
        die();
    }
}