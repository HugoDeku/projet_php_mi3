<?php


namespace mvc\model\business;
require_once ("PDOBusiness.php");
require_once (__DIR__.'/../entities/Magazine.php');
require_once (__DIR__.'/../entities/Entity.php');


use mvc\model\entities\Entity;
use mvc\model\entities\Magazine;
use PDOStatement;



class MagazineBusiness extends PDOBusiness
{
    public function findById(int $id): ?Entity
    {
        $stmt = $this->executePrepare("select * from magazine where id=:id", [ "id" => $id]);
        $magazine = $stmt->fetch();
        if (!$magazine) return null;
        $magazineRes = new Magazine($magazine["TITRE"], $magazine["IMAGE"], $magazine["NUMERO"], $magazine["DATEPARUTION"]
            , $magazine["PERIODICITE"]);
        $magazineRes->setId($magazine['ID']);
        return $magazineRes;
    }

    public function find(): PDOStatement
    {
        $stmt=$this->executePrepare("select * from magazine",[]);
        return $stmt;
    }

    public function findAll(int $pdoFecthMode): array
    {
        $stmt=$this->find();
        $magazines = $stmt->fetchAll($pdoFecthMode);

        $magazinesRes=[];
        foreach($magazines as $magazine) {
            $magazineRes = new Magazine($magazine["TITRE"], $magazine["IMAGE"], $magazine["NUMERO"], $magazine["DATEPARUTION"]
                , $magazine["PERIODICITE"]);
            $magazineRes->setId($magazine['ID']);
            $magazinesRes[] = $magazineRes;
        }
        return $magazinesRes;
    }

    public function insert(Entity $e): PDOStatement
    {
        $req = "insert into MAGAZINE(TITRE, IMAGE, NUMERO, DATEPARUTION, PERIODICITE) values (:titre, :image, :numero, :dateparution, :periodicite)";
        $params = array("titre" => $e->getTitre(), "image" => $e->getImage(), "numero" => $e->getNumero(),
            "dateparution" => $e->getDateParution(), "periodicite" => $e->getPeriodicite());
        $res=$this->executePrepare($req,$params);
        return $res;
    }

    public function update(Entity $e): PDOStatement
    {
        $req = "update MAGAZINE SET titre=:titre, image=:image, numero=:numero, dateparution=:dateparution, periodicite=:periodicite WHERE id=:id";
        $params = array("titre" => $e->getTitre(), "image" => $e->getImage(), "numero" => $e->getNumero(),
            "dateparution" => $e->getDateParution(), "periodicite" => $e->getPeriodicite(), "id"=>$e->getId());
        $res=$this->executePrepare($req,$params);
        return $res;
    }

    public function delete(int $id) : PDOStatement
    {
        $req = "DELETE FROM MAGAZINE WHERE id=:id";
        $params = array("id"=>$id);
        $res=$this->executePrepare($req,$params);
        return $res;
    }


}