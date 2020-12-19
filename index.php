<?php

require_once(__DIR__ . "/controller/AccueilController.php");
require_once(__DIR__ . "/controller/UtilisateurController.php");
require_once(__DIR__ . "/controller/MagazineController.php");
require_once(__DIR__ . "/controller/MusiqueController.php");
require_once(__DIR__ . "/controller/LivreController.php");
require_once(__DIR__ . "/controller/FilmController.php");
require_once(__DIR__ . "/controller/CartController.php");
require_once(__DIR__ . "/utils/Enum.php");
require_once(__DIR__ . "/utils/Date.php");

use mvc\controller\AccueilController;
use mvc\controller\UtilisateurController;
use mvc\controller\MagazineController;
use mvc\controller\MusiqueController;
use mvc\controller\FilmController;
use mvc\controller\LivreController;
use mvc\controller\CartController;

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
                            } else {
                                $controller->affichageConnexion();
                            }
                        }
                        break;
                    case 'deconnexion':
                        if (isset($_SESSION['user'])) {
                            unset($_SESSION['user']);
                            $controller->affichageConnexion();
                        }
                        break;
                    case 'inscription':
                        if (isset($_POST['email']) && isset($_POST['login']) && isset($_POST['motdepasse'])) {
                            $controller->inscription($_POST['email'], $_POST['login'], $_POST['motdepasse']);
                        } else {
                            $controller->affichageInscription();
                        }
                        break;
                }
            }
            break;
        case 'magazine':
            $controller = new MagazineController();
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case "ajouter":
                        if (isset($_POST['submit'])) {
                            $controller->addProduit($_POST['image'], $_POST['titre'], $_POST['periodicite'], $_POST['month']
                                , $_POST['year'], $_POST['numero']);
                        }
                        break;
                    case "afficher":
                        if (isset($_GET['id'])) {
                            $controller->showProduct($_GET['id']);
                        }
                        break;
                    case "cart":
                        if (isset($_GET['id'])) {
                            $controller->cartProduct($_GET['id']);
                            $controller->affichage();
                        }
                        break;
                    case "supprimer":
                        $controller->supprimer($_GET['id']);
                        break;
                    case "modifierView":
                        $controller->modifierView($_GET['id']);
                        break;
                    case "modifier":
                        $controller->modifier($_POST['id'], $_POST['titre'], $_POST['periodicite'], $_POST['month']
                            , $_POST['year'], $_POST['numero']);
                        break;
                }
            } else {
                $controller->affichage();
            }
            break;
        case 'musique':
            $controller = new MusiqueController();
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case "ajouter":
                        if (isset($_POST['submit'])) {
                            $controller->addProduit($_POST['image'], $_POST['titre'], $_POST['artiste'], $_POST['year']
                                , $_POST['style'], $_POST['nbpiste'], $_POST['stock']);
                        }
                        break;
                    case "afficher":
                        if (isset($_GET['id'])) {
                            $controller->showProduct($_GET['id']);
                        }
                        break;
                    case "cart":
                        if (isset($_GET['id'])) {
                            $controller->cartProduct($_GET['id']);
                            $controller->affichage();
                        }
                        break;
                    case "supprimer":
                        $controller->supprimer($_GET['id']);
                        break;
                    case "modifierView":
                        $controller->modifierView($_GET['id']);
                        break;
                    case "modifier":
                        $controller->modifier($_POST['id'], $_POST['titre'], $_POST['artiste'], $_POST['year']
                            , $_POST['stock'], $_POST['pistes'], $_POST['style']);
                        break;
                }
            } else {
                $controller->affichage();
            }
            break;
        case 'film':
            $controller = new FilmController();
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case "afficher":
                        if (isset($_GET['id'])) {
                            $controller->showProduct($_GET['id']);
                        }
                        break;
                    case "cart":
                        if (isset($_GET['id'])) {
                            $controller->cartProduct($_GET['id']);
                            $controller->affichage();
                        }
                        break;
                }
            } else {
                $controller->affichage();
            }
            break;
        case 'livre':
            $controller = new LivreController();
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case "afficher":
                        if (isset($_GET['id'])) {
                            $controller->showProduct($_GET['id']);
                        }
                        break;
                    case "cart":
                        if (isset($_GET['id'])) {
                            $controller->cartProduct($_GET['id']);
                            $controller->affichage();
                        }
                        break;
                }
            } else {
                $controller->affichage();
            }
            break;
        case 'cart':
            $controller = new CartController();
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case "empty":
                        $controller->emptyCart();
                        $controller->affichage();
                        break;
                }
            } else {
                $controller->affichage();
            }
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


