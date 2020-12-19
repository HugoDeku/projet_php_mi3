<?php

namespace mvc\controller;

use mvc\model\entities\Entity;

require_once('AController.php');

class MagazineController extends AController
{
    public function affichage(){
        $magazines = $this->findAll();
        var_dump($magazines);
        require (__DIR__."/../view/magazine.php");
    }

}