<?php

require_once (__DIR__."/../model/entities/Produit.php");
require_once (__DIR__."/../model/entities/Musique.php");
require_once (__DIR__."/../model/entities/Film.php");
require_once (__DIR__."/../model/entities/Livre.php");
require_once (__DIR__."/../model/entities/Magazine.php");

use \mvc\model\entities\Produit;
use \mvc\model\entities\Musique;
use \mvc\model\entities\Magazine;
use \mvc\model\entities\Film;
use \mvc\model\entities\Livre;

abstract class Enum{
    public static $ProduitEnum = array("Musique"=>0, "Magazine"=>1, "Film"=>2, "Livre"=>3);
    public static $PeriodiciteEnum = array("Annuel"=>0, "Semestriel"=>1, "Trimestriel"=>2, "Quadrimestriel"=>3, "Mensuel"=>4, "Hebdomadaire"=>5);

    public static function produitToKey(Produit $produit) : string{
        if($produit instanceof Musique){
            return "Musique";
        }elseif($produit instanceof Magazine){
            return "Magazine";
        }elseif($produit instanceof Film){
            return "Film";
        }elseif($produit instanceof Livre){
            return "Livre";
        }
    }

}