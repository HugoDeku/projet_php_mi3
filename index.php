<?php

require_once(__DIR__ . "/controller/AccueilController.php");
require_once(__DIR__ . "/controller/UtilisateurController.php");
require_once(__DIR__ . "/controller/MagazineController.php");

use mvc\controller\AccueilController;
use mvc\controller\UtilisateurController;
use mvc\controller\MagazineController;
session_start();
if (isset($_GET['controller'])) {
    switch ($_GET['controller']) {
        case 'utilisateur':
            $controller = new UtilisateurController();
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'connexion':
                        if (isset($_SESSION['error'])) {
                            $controller->affichage();
                        } else {
                            if (isset($_POST["login"]) && isset($_POST["motdepasse"])) {
                                $controller->connexion($_POST["login"], $_POST["motdepasse"]);
                            }
                        }
                        break;
                    case 'deconnexion':
                        if(isset($_SESSION['user'])){
                            unset($_SESSION['user']);
                            $controller->affichage();
                        }
                        break;
                }
            } else {
                $controller->affichage();
            }
            break;
        case 'magazine':
            $controller = new MagazineController();
            $controller->affichage();
            break;
        case 'musique':
            $controller = new MusiqueController();
            $controller->affichage();
            break;
        case 'film':
            $controller = new FilmController();
            $controller->affichage();
            break;
        case 'livre':
            $controller = new LivreController();
            $controller->affichage();
            break;
    }
} else {
    $controller = new AccueilController();
    $controller->affichage();

}


