<?php

namespace mvc\controller;

require_once('AController.php');
require_once(__DIR__ . '/../model/business/MagazineBusiness.php');
require_once(__DIR__ . '/../model/business/MusiqueBusiness.php');
require_once(__DIR__ . '/../model/business/LivreBusiness.php');
require_once(__DIR__ . '/../model/business/FilmBusiness.php');
require_once(__DIR__ . '/../model/business/EmpruntBusiness.php');

require_once(__DIR__ . '/../model/entities/Film.php');
require_once(__DIR__ . '/../model/entities/Livre.php');
require_once(__DIR__ . '/../model/entities/Emprunt.php');
require_once(__DIR__ . '/../model/entities/Musique.php');

use mvc\model\business\EmpruntBusiness;
use mvc\model\business\MagazineBusiness;
use mvc\model\business\LivreBusiness;
use mvc\model\business\MusiqueBusiness;
use mvc\model\business\FilmBusiness;
use mvc\model\entities\Emprunt;
use mvc\model\entities\Film;
use mvc\model\entities\Livre;
use mvc\model\entities\Musique;
use PDO;

class CartController extends AController
{
    public function __construct()
    {
        $this->business = new EmpruntBusiness();
    }

    public function affichage()
    {
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        }

        if (isset($_SESSION['cart'])) {
            $categories = $_SESSION["cart"];
        }
        require(__DIR__ . "/../view/cart.php");
    }

    public function emptyCart()
    {
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
    }

    public function validCart()
    {
        if(isset($_SESSION['cart'])){
            $userId = $_SESSION['user']->getId();

            foreach ($_SESSION['cart'] as $cat){
                foreach ($cat as $produit){
                    if($produit instanceof Film){
                        $business = new FilmBusiness();
                        $oldProduit = $business->findById($produit->getId());
                        $ext = strtolower(pathinfo(basename($oldProduit->getImage()),PATHINFO_EXTENSION));
                        $imageName = strtolower(str_replace(" ", "",$oldProduit->getTitre())) . "." . $ext;
                        if($oldProduit->getStock()>0){
                            $newStock = $oldProduit->getStock()-1;
                        }else{
                            $newStock=0;
                        }
                        $newProduit = new Film($oldProduit->getTitre(), $oldProduit->getImage(), $newStock, $oldProduit->getYear()
                        , $oldProduit->getRealisateur(), $oldProduit->getActeur());
                        $newProduit->setId($produit->getId());
                        $newProduit->setImage($imageName);
                        $business->update($newProduit);
                        rename($oldProduit->getImage(), "./view/data/video/".$imageName);
                        $type = \Enum::$ProduitEnum["Film"];

                    }elseif($produit instanceof Livre){
                        $business = new LivreBusiness();
                        $oldProduit = $business->findById($produit->getId());
                        $ext = strtolower(pathinfo(basename($oldProduit->getImage()),PATHINFO_EXTENSION));
                        $imageName = strtolower(str_replace(" ", "",$oldProduit->getTitre())) . "." . $ext;
                        if($oldProduit->getStock()>0){
                            $newStock = $oldProduit->getStock()-1;
                        }else{
                            $newStock=0;
                        }
                        $newProduit = new Livre($oldProduit->getTitre(), $oldProduit->getImage(), $newStock, $oldProduit->getYear()
                            , $oldProduit->getAuteur(), $oldProduit->getType(), $oldProduit->getPages());
                        $newProduit->setId($produit->getId());
                        $newProduit->setImage($imageName);
                        $business->update($newProduit);
                        rename($oldProduit->getImage(), "./view/data/livre/".$imageName);
                        $type = \Enum::$ProduitEnum["Livre"];

                    }elseif($produit instanceof Musique){
                        $business = new MusiqueBusiness();
                        $oldProduit = $business->findById($produit->getId());
                        $ext = strtolower(pathinfo(basename($oldProduit->getImage()),PATHINFO_EXTENSION));
                        $imageName = strtolower(str_replace(" ", "",$oldProduit->getTitre())) . "." . $ext;
                        if($oldProduit->getStock()>0){
                            $newStock = $oldProduit->getStock()-1;
                        }else{
                            $newStock=0;
                        }
                        $newProduit = new Musique($oldProduit->getTitre(), $newStock, $oldProduit->getImage(), $oldProduit->getArtiste(), $oldProduit->getYear()
                            , $oldProduit->getNbPiste(), $oldProduit->getStyle());
                        $newProduit->setId($produit->getId());
                        $newProduit->setImage($imageName);
                        $business->update($newProduit);
                        rename($oldProduit->getImage(), "./view/data/musique/".$imageName);
                        $type = \Enum::$ProduitEnum["Musique"];
                    }
                    $newEmprunt = new Emprunt($userId, $newProduit->getId(), $type, date("Y-m-d"));
                    $this->insert($newEmprunt);
                }
            }
            unset($_SESSION["cart"]);
            header("Location: index.php");
        }else{
            header("Location: index.php?controller=cart");
        }
    }

}
