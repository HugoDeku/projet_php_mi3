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

    public function showProduct(int $id)
    {
        $livre = $this->findById($id);
        require(__DIR__ . "/../view/livre_produit.php");
    }

    public function affichage(){
        $livres = $this->findAll();
        require (__DIR__."/../view/livre.php");
    }

    public function cartProduct(int $id)
    {
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = array();
        }

        if (!isset($_SESSION["cart"]["livres"])) {
            $_SESSION["cart"]["livres"] = [];
        }

        $_SESSION["cart"]["livres"][] = $this->findById($id);



    }

}