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
                }
            } else {
                $controller->affichage();
            }
            break;
        case 'magazine':
            $controller = new MagazineController();
            $controller->affichage();
            break;
    }
} else {
    $controller = new AccueilController();
    $controller->affichage();

}


