<?php //BaseController.php

// Interdit de l'instancier !!
abstract class BaseController
{
    protected function redirect($url)
    {
        header("Location: $url");
        die();
    }
}