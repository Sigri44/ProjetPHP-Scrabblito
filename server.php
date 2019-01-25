<?php //server.php

//auto-chargement de class
//(include les définitions de nos classes)
spl_autoload_register(function ($className) {
    include($className . ".php");
});

// Création de l'intance d'une classe
$controller = new Controller();

$action = $_GET['action'];

switch ($action) {
    case "new-game":
        // Appel d'une méthode
        $controller->newGame();
        break;
    case "answer":
        $answer = $_GET['answer'];
        $controller->checkAnswer($answer);
        break;
}

