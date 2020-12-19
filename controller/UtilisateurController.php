<?php

namespace mvc\controller;

require_once('AController.php');
require_once(__DIR__ . '/../model/business/UtilisateurBusiness.php');

use mvc\model\entities\Utilisateur;
use mvc\model\business\UtilisateurBusiness;

class UtilisateurController extends AController
{
    public function __construct()
    {
        $this->manager = new UtilisateurBusiness();
    }

    public function connexion(string $login,string $motdepasse){
        $user = $this->getManager()->getUserByPseudo($login);

        if($user == null){
            $_SESSION['error'] = 'Utilisateur introuvableUtilisateur introuvable';
            require (__DIR__."/../index.php?controller=utilisateur&action=connexion");
        }
    }

    public function affichage(){
        require(__DIR__."/../view/connexion.php");
    }


}
