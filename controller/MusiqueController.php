<?php

namespace mvc\controller;

require_once(__DIR__.'/../model/business/MagazineBusiness.php');

use mvc\model\business\MagazineBusiness;
use mvc\model\entities\Entity;

require_once('AController.php');

class MusiqueController extends AController
{
    public function __construct()
    {
        $this->business = new MusiqueBusiness();
    }

    public function affichage(){
        $musiques = $this->findAll();
        require (__DIR__."/../view/cd.php");
    }

}