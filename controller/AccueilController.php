<?php

namespace mvc\controller;

require_once('AController.php');

class AccueilController extends AController
{
    public function affichage(){
        if(isset($_SESSION['user'])){
            $user = $_SESSION['user'];
        }
        require (__DIR__."/../view/accueil.php");
    }

}
