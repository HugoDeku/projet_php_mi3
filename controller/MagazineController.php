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

            $_SESSION['preMagazine'] = $newMagazine;

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

        if (!isset($_SESSION["cart"]["magazine"])) {
            $_SESSION["cart"]["magazine"] = [];
        }

        $_SESSION["cart"]["magazine"][] = $this->findById($id);

    }

    public function supprimer($id)
    {
        $magazine = $this->findById($id);
        unlink($magazine->getImage());
        $this->getBusiness()->delete($id);
        header("Location: index.php?controller=utilisateur&action=connexion");
    }

    public function modifier($id, $titre, $perio, $month, $year, $numero)
    {
        $oldMagazine = $this->findById($id);

        try{

            $ext = strtolower(pathinfo(basename($oldMagazine->getImage()),PATHINFO_EXTENSION));
            $imageName = strtolower(str_replace(" ", "",$titre)) . "." . $ext;
            $dateParution = \Date::getStringMonthYear($month, $year);
            $newMagazine = new Magazine($titre, $imageName, $numero, $dateParution, $perio);
            $newMagazine->setId($id);
            $newMagazine->setImage($imageName);
            $this->getBusiness()->update($newMagazine);
            rename($oldMagazine->getImage(), "./view/data/magazine/".$imageName);
            header("Location: index.php?controller=utilisateur&action=connexion");
        }catch(\Exception $error){
            $_SESSION['error'] = "Valeur manquante ou titre déjà utilisé";
            header("Location: index.php?controller=utilisateur&action=connexion");
        }
    }

    public function modifierView($id)
    {
        $magazine = $this->findById($id);
        require("./view/magazine_modif.php");
    }

}