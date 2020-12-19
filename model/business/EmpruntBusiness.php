<?php


namespace mvc\model\business;
require_once ("PDOBusiness.php");
require_once (__DIR__.'/../entities/Emprunt.php');
require_once (__DIR__.'/../entities/Entity.php');


use mvc\model\entities\Entity;
use mvc\model\entities\Emprunt;
use PDOStatement;



class EmpruntBusiness extends PDOBusiness
{
    public function findById(int $id): ?Entity
    {
        $stmt = $this->executePrepare("select * from emprunt where id=:id", [ "id" => $id]);
        $emprunt = $stmt->fetch();
        if (!$emprunt) return null;
        $empruntRes = new Emprunt($emprunt["UTILISATEUR_ID"], $emprunt["PRODUIT_ID"], $emprunt["TYPE"], $emprunt["DATE"]);
        $empruntRes->setId($emprunt['ID']);
        return $empruntRes;
    }

    public function find(): PDOStatement
    {
        $stmt=$this->executePrepare("select * from emprunt",[]);
        return $stmt;
    }

    public function findAll(int $pdoFecthMode): array
    {
        $stmt=$this->find();
        $emprunts = $stmt->fetchAll($pdoFecthMode);

        $empruntsRes=[];
        foreach($emprunts as $emprunt) {
            $empruntRes = new Emprunt($emprunt["UTILISATEUR_ID"], $emprunt["PRODUIT_ID"], $emprunt["TYPE"], $emprunt["DATE"]);
            $empruntRes->setId($emprunt['ID']);
            $empruntsRes[] = $empruntRes;
        }
        return $empruntsRes;
    }

    public function insert(Entity $e): PDOStatement
    {
        $req = "insert into EMPRUNT(UTILISATEUR_ID, PRODUIT_ID, TYPE, DATE) values (:utilisateur_id, :produit_id, :type, :date)";
        $params = array("utilisateur_id" => $e->getUtilisateurId(), "produit_id" => $e->getProduitId(), "type" => $e->getType(),
            "date" => $e->getDate());
        $res=$this->executePrepare($req,$params);
        return $res;
    }

    public function delete(Entity $e) : PDOStatement
    {
        $req = "DELETE FROM EMPRUNT WHERE id=:id";
        $params = array("id"=>$e->getId());
        $res=$this->executePrepare($req,$params);
        return $res;
    }



}