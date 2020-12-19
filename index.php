<?php

require_once (__DIR__."/controller/AccueilController.php");
require_once (__DIR__."/controller/UtilisateurController.php");

use mvc\controller\AccueilController;
use mvc\controller\UtilisateurController;

if(isset($_GET['controller'])){
    switch ($_GET['controller']){
        case 'utilisateur':
            $controller = new UtilisateurController();
            if(isset($_GET['action'])){
                switch($_GET['action']){
                    case 'connexion':
                        if(isset($_SESSION['error'])){
                            echo($_SESSION['error']);
                            unset($_SESSION['error']);
                        }else{
                            if(isset($_POST["login"]) && isset($_POST["motdepasse"])){
                                $controller->connexion($_POST["login"], $_POST["motdepasse"]);
                            }
                        }
                        break;
                }
            }else{
                $controller->affichage();
            }
    }
}else{
    $controller = new AccueilController();
    $controller->affichage();

}


