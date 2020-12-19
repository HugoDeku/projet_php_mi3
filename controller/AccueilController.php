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
use PDO;

class AccueilController extends AController
{
    public function affichage(){
        if(isset($_SESSION['user'])){
            $user = $_SESSION['user'];
        }
        $musiqueBusiness = new MusiqueBusiness();
        $filmBusiness = new FilmBusiness();
        $livreBusiness = new LivreBusiness();
        $magazineBusiness = new MagazineBusiness();

        $musiques = ($musiqueBusiness->findAll(PDO::FETCH_ASSOC));
        $films = ($filmBusiness->findAll(PDO::FETCH_ASSOC));
        $livres = ($livreBusiness->findAll(PDO::FETCH_ASSOC));
        $magazines = ($magazineBusiness->findAll(PDO::FETCH_ASSOC));

        $categories = array(
            "musique" => $musiques,
            "film" => $films,
            "magazine" => $magazines,
            "livre" => $livres);
        require (__DIR__."/../view/accueil.php");
    }

}
