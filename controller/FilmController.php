<?php

namespace mvc\controller;

require_once(__DIR__.'/../model/business/FilmBusiness.php');

use mvc\model\business\FilmBusiness;
use mvc\model\entities\Entity;

require_once('AController.php');

class FilmController extends AController
{
    public function __construct()
    {
        $this->business = new FilmBusiness();
    }

    public function affichage(){
        $films = $this->findAll();
        require (__DIR__."/../view/dvd.php");
    }

}