<?php

require_once(__DIR__ . "/controller/AccueilController.php");
require_once(__DIR__ . "/controller/UtilisateurController.php");
require_once(__DIR__ . "/controller/MagazineController.php");
require_once(__DIR__ . "/controller/MusiqueController.php");
require_once(__DIR__ . "/controller/LivreController.php");
require_once(__DIR__ . "/controller/FilmController.php");
require_once(__DIR__ . "/utils/Enum.php");
require_once(__DIR__ . "/utils/Date.php");

use mvc\controller\AccueilController;
use mvc\controller\UtilisateurController;
use mvc\controller\MagazineController;
use mvc\controller\MusiqueController;
use mvc\controller\FilmController;
use mvc\controller\LivreController;

session_start();
if (isset($_GET['controller'])) {
    switch ($_GET['controller']) {
        case 'utilisateur':
            $controller = new UtilisateurController();
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'connexion':
                        if (isset($_SESSION['error'])) {
                            $controller->affichageConnexion();
                        } else {
                            if (isset($_POST["login"]) && isset($_POST["motdepasse"])) {
                                $controller->connexion($_POST["login"], $_POST["motdepasse"]);
                            }else{
                                $controller->affichageConnexion();
                            }
                        }
                        break;
                    case 'deconnexion':
                        if(isset($_SESSION['user'])){
                            unset($_SESSION['user']);
                            $controller->affichageConnexion();
                        }
                        break;
                    case 'inscription':
                        if(isset($_POST['email']) && isset($_POST['login']) && isset($_POST['motdepasse'])){
                            $controller->inscription($_POST['email'], $_POST['login'], $_POST['motdepasse']);
                        }else{
                            $controller->affichageInscription();
                        }
                        break;
                }
            }
            break;
        case 'magazine':
            $controller = new MagazineController();
            $controller->affichage();
            break;
        case 'musique':
            $controller = new MusiqueController();
            echo "hi";
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
        default:
            $controller = new AccueilController();
            $controller->affichage();
            break;

    }
} else {
    $controller = new AccueilController();
    $controller->affichage();

}


