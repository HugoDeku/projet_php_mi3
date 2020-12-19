<?php

namespace mvc\controller;

require_once('AController.php');
require_once(__DIR__.'/../model/business/MagazineBusiness.php');
require_once(__DIR__.'/../model/business/MusiqueBusiness.php');
require_once(__DIR__.'/../model/business/LivreBusiness.php');
require_once(__DIR__.'/../model/business/FilmBusiness.php');

use mvc\model\business\MagazineBusiness;
use mvc\model\business\LivreBusiness;
use mvc\model\business\MusiqueBusiness;
use mvc\model\business\FilmBusiness;

class AccueilController extends AController
{
    public function affichage(){
        if(isset($_SESSION['user'])){
            $user = $_SESSION['user'];
        }
        $musiqueController = new MusiqueController();
        $filmController = new FilmController();
        $livreController = new LivreController();
        $magazineController = new MagazineController();

        $musiques = ($musiqueController->findAll());
        $films = ($filmController->findAll());
        $livres = ($livreController->findAll());
        $magazines = ($magazineController->findAll());

        $categories = array(
            "musique" => $musiques,
            "films" => $films,
            "magazines" => $magazines,
            "livres" => $livres);
        require (__DIR__."/../view/accueil.php");
    }

}
