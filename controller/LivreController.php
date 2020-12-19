<?php

namespace mvc\controller;

require_once(__DIR__.'/../model/business/LivreBusiness.php');

use mvc\model\business\LivreBusiness;
use mvc\model\entities\Entity;

require_once('AController.php');

class LivreController extends AController
{
    public function __construct()
    {
        $this->business = new LivreBusiness();
    }

    public function affichage(){
        $livres = $this->findAll();
        require (__DIR__."/../view/livre.php");
    }

}