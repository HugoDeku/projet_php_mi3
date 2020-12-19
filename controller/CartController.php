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

class CartController extends AController
{
    public function affichage(){
        if(isset($_SESSION['user'])){
            $user = $_SESSION['user'];
        }

        $categories = $_SESSION["cart"];
        require (__DIR__."/../view/cart.php");
    }

    public function emptyCart(){
        unset($_SESSION['cart']);
    }

}
