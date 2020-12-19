<?php

namespace mvc\controller;

require_once(__DIR__.'/../model/business/MagazineBusiness.php');

use mvc\model\business\MagazineBusiness;
use mvc\model\entities\Entity;
use mvc\model\entities\Magazine;

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

    public function showProduct(int $id)
    {
        $magazine = $this->findById($id);
        require(__DIR__ . "/../view/magazine_produit.php");
    }

    public function addProduit($image, $titre, $periodicite, $month, $year, $numero)
    {

        try{


            $ext = strtolower(pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION));
            $imageName = strtolower(str_replace(" ", "",$titre)) . "." . $ext;
            $dateParution = \Date::getStringMonthYear($month, $year);
            $newMagazine = new Magazine($titre, $imageName, $numero, $dateParution, $periodicite);
            $newMagazine->setImage($imageName);
            $this->insert($newMagazine);

            $target_file = "./view/data/magazine/" . $imageName;
            $err = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

            header("Location: index.php?controller=utilisateur&action=connexion");
        }catch(\Exception $error){
            $_SESSION['error'] = "Valeur manquante ou titre déjà utilisé";

        }
        header("Location: index.php?controller=utilisateur&action=connexion");



    }

    public function cartProduct(int $id)
    {
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = array();
        }

        if (!isset($_SESSION["cart"]["magazines"])) {
            $_SESSION["cart"]["magazines"] = [];
        }

        $_SESSION["cart"]["magazines"][] = $this->findById($id);



    }

}