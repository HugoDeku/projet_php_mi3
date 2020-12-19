<?php

namespace mvc\controller;

require_once('AController.php');

class AccueilController extends AController
{
    public function affichage(){
        require (__DIR__."/../view/accueil.php");
    }

}
