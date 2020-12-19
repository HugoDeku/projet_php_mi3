<?php

namespace mvc\controller;


require_once(__DIR__.'/../model/business/MusiqueBusiness.php');
require_once(__DIR__.'/../model/entities/Musique.php');

use mvc\model\business\MusiqueBusiness;
use mvc\model\entities\Entity;
use mvc\model\entities\Musique;

require_once('AController.php');

class MusiqueController extends AController
{
    public function __construct()
    {
        $this->business = new MusiqueBusiness();
    }

    public function affichage()
    {
        $musiques = $this->findAll();
        require(__DIR__ . "/../view/cd.php");
    }

    public function showProduct(int $id)
    {
        $cd = $this->findById($id);
        require(__DIR__ . "/../view/cd_produit.php");
    }

    public function addProduit($image, $titre, $artiste, $year, $style, $nbpiste, $stock)
    {
        try{

            $ext = strtolower(pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION));
            $imageName = strtolower(str_replace(" ", "",$titre)) . "." . $ext;
            $newMagazine = new Musique($titre,$stock, $imageName, $artiste, $year, $nbpiste, $style);
            $newMagazine->setImage($imageName);
            $this->insert($newMagazine);

            $target_file = "./view/data/musique/" . $imageName;
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

        if (!isset($_SESSION["cart"]["musique"])) {
            $_SESSION["cart"]["musique"] = [];
        }

        $_SESSION["cart"]["musique"][] = $this->findById($id);



    }
}