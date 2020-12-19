<?php

namespace mvc\controller;

require_once(__DIR__.'/../model/business/MusiqueBusiness.php');

use mvc\model\business\MusiqueBusiness;
use mvc\model\entities\Entity;

require_once('AController.php');

class MusiqueController extends AController
{
    public function __construct()
    {
        $this->business = new MusiqueBusiness();
    }

    public function affichage(){
        echo "coucou";
        $musiques = $this->findAll();
        require (__DIR__."/../view/cd.php");
    }

}