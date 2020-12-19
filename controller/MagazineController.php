<?php

namespace mvc\controller;

require_once(__DIR__.'/../model/business/MagazineBusiness.php');

use mvc\model\business\MagazineBusiness;
use mvc\model\entities\Entity;

require_once('AController.php');

class MagazineController extends AController
{
    public function __construct()
    {
        $this->business = new MagazineBusiness();
    }

    public function affichage(){
        $magazines = $this->findAll();
        require (__DIR__."/../view/magazine.php");
    }

    public function addProduit($image, $titre, $periodicite, $month, $year, $numero)
    {

    }

}