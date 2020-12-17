<?php


namespace mvc\model\business;
require_once ("PDOBusiness.php");
require_once (__DIR__.'/../entities/Utilisateur.php');
require_once (__DIR__.'/../entities/Entity.php');


use mvc\model\entities\Entity;
use mvc\model\entities\Utilisateur;
use PDOStatement;



class UtilisateurBusiness extends PDOBusiness
{
    public function findById(int $id): ?Entity
    {
        $stmt = $this->executePrepare("select * from utilisateur where id=:id", [ "id" => $id]);
        $utilisateur = $stmt->fetch();
        if (!$utilisateur) return null;
        $utilisateurRes = new Utilisateur($utilisateur["PSEUDO"], $utilisateur["EMAIL"], $utilisateur["MOTDEPASSE"], $utilisateur["ISADMIN"]);
        $utilisateurRes->setId($utilisateur['ID']);
        return $utilisateurRes;
    }

    public function find(): PDOStatement
    {
        $stmt=$this->executePrepare("select * from utilisateur",[]);
        return $stmt;
    }

    public function findAll(int $pdoFecthMode): array
    {
        $stmt=$this->find();
        $utilisateurs = $stmt->fetchAll($pdoFecthMode);

        $utilisateursRes=[];
        foreach($utilisateurs as $utilisateur) {
            $utilisateurRes = new Utilisateur($utilisateur["PSEUDO"], $utilisateur["EMAIL"], $utilisateur["MOTDEPASSE"], $utilisateur["ISADMIN"]);
            $utilisateurRes->setId($utilisateur['ID']);
            $utilisateursRes[] = $utilisateurRes;
        }
        return $utilisateursRes;
    }

    public function insert(Entity $e): PDOStatement
    {
        $req = "insert into UTILISATEUR(PSEUDO, EMAIL, MOTDEPASSE, ISADMIN) values (:pseudo, :email, :motdepasse, :isadmin)";
        $params = array("pseudo" => $e->getPseudo(), "email" => $e->getEmail(), "motdepasse" => $e->getMotdepasse(),
            "isadmin" => $e->isAdmin());
        $res=$this->executePrepare($req,$params);
        return $res;
    }

    public function getUserByPseudo(string $pseudo) : ?Entity{
        $stmt = $this->executePrepare("select * from utilisateur where pseudo=:pseudo", [ "pseudo" => $pseudo]);
        $utilisateur = $stmt->fetch();
        if (!$utilisateur) return null;
        $utilisateurRes = new Utilisateur($utilisateur["PSEUDO"], $utilisateur["EMAIL"], $utilisateur["MOTDEPASSE"], $utilisateur["ISADMIN"]);
        $utilisateurRes->setId($utilisateur['ID']);
        return $utilisateurRes;
    }


}