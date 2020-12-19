<?php

namespace mvc\controller;

require_once('AController.php');
require_once(__DIR__ . '/../model/business/UtilisateurBusiness.php');
require_once(__DIR__ . '/../model/business/MusiqueBusiness.php');
require_once(__DIR__ . '/../model/business/MagazineBusiness.php');
require_once (__DIR__. '/../utils/PasswordHash.php');

use mvc\model\business\MagazineBusiness;
use mvc\model\business\MusiqueBusiness;
use mvc\model\entities\Magazine;
use mvc\model\entities\Musique;
use mvc\model\entities\Utilisateur;
use mvc\model\business\UtilisateurBusiness;
use PDO;

class UtilisateurController extends AController
{
    public function __construct()
    {
        $this->business = new UtilisateurBusiness();
    }

    public function connexion(string $login,string $motdepasse){
        $user = $this->getBusiness()->getUserByPseudo($login);
        if($user == null){
            $_SESSION['error'] = 'Utilisateur introuvable';
            header ("Location: index.php?controller=utilisateur&action=connexion");
        }else{
            if($user->getMotdepasse() == \PasswordHash::passwordToHash($motdepasse)){
                $_SESSION['user'] = $user;
                header ("Location: index.php");
            }else{
                $_SESSION['error'] = 'Mot de passe incorrect';
                header ("Location: index.php?controller=utilisateur&action=connexion");
            }
        }
    }

    public function affichageConnexion(){
        if(isset($_SESSION['error'])){
            $error = $_SESSION['error'];
            unset($_SESSION['error']);
        }
        if(isset($_SESSION['user'])){
            $user = $_SESSION['user'];
            if($user->isAdmin()){
                $musiqueBusiness = new MusiqueBusiness();
                $magazineBusiness = new MagazineBusiness();

                $musiques = ($musiqueBusiness->findAll(PDO::FETCH_ASSOC));
                $magazines = ($magazineBusiness->findAll(PDO::FETCH_ASSOC));
                if(isset($_SESSION['preMusique'])){
                    $premusique = $_SESSION['preMusique'];
                }else{
                    $premusique = new Musique("Titre",30, "image.jpg", "Artiste", 2020,
                    21, "Electro");
                    $_SESSION['preMusique'] = $premusique;
                }

                if(isset($_SESSION['preMagazine'])){
                    $premagazine = $_SESSION['preMagazine'];
                }else{
                    $premagazine = new Magazine("Titre", "image.png", 1, "2020-01", 0);
                    $_SESSION['preMagazine'] = $premagazine;
                }
            }
        }
        require(__DIR__."/../view/connexion.php");
    }

    public function affichageInscription(){
        if(isset($_SESSION['error'])){
            $error = $_SESSION['error'];
            unset($_SESSION['error']);
        }
        require(__DIR__."/../view/inscription.php");
    }

    public function inscription($email, $login, $motdepasse)
    {
        $newUtilisateur = new Utilisateur($login, $email, \PasswordHash::passwordToHash($motdepasse), false);
        $_SESSION['newUser'] = $newUtilisateur;
        try{
            $this->insert($newUtilisateur);
            header("Location: index.php?controller=utilisateur&action=connexion");
        }catch(\Exception $error){
            $_SESSION['error'] = "Login/Email déjà présent dans la base de données, essayez de vous connecter";
            header("Location: index.php?controller=utilisateur&action=inscription");
        }

    }


}
