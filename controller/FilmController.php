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

    public function showProduct(int $id)
    {
        $dvd = $this->findById($id);
        require(__DIR__ . "/../view/dvd_produit.php");
    }

    public function affichage(){
        $films = $this->findAll();
        require (__DIR__."/../view/dvd.php");
    }

    public function cartProduct(int $id)
    {
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = array();
        }

        if (!isset($_SESSION["cart"]["films"])) {
            $_SESSION["cart"]["films"] = [];
        }

        $_SESSION["cart"]["films"][] = $this->findById($id);



    }

}