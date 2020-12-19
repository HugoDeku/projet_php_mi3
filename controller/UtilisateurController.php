<?php

namespace mvc\controller;

require_once('AController.php');
require_once(__DIR__ . '/../model/business/UtilisateurBusiness.php');
require_once (__DIR__. '/../utils/PasswordHash.php');

use mvc\model\entities\Utilisateur;
use mvc\model\business\UtilisateurBusiness;

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
        }
        require(__DIR__."/../view/connexion.php");
    }

    public function affichageInscription(){
        require(__DIR__."/../view/inscription.php");
    }


}
