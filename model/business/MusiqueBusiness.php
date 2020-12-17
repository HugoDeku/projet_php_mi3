<?php


namespace mvc\model\business;
require_once ("PDOBusiness.php");
require_once (__DIR__.'/../entities/Musique.php');
require_once (__DIR__.'/../entities/Entity.php');


use mvc\model\entities\Entity;
use mvc\model\entities\Musique;
use PDOStatement;



class MusiqueBusiness extends PDOBusiness
{
    public function findById(int $id): ?Entity
    {
        $stmt = $this->executePrepare("select * from musique where id=:id", [ "id" => $id]);
        $musique = $stmt->fetch();
        if (!$musique) return null;
        $musiqueRes = new Musique($musique["TITRE"], $musique["STOCK"], $musique["IMAGE"], $musique["ARTISTE"], $musique["ANNEESORTIE"], $musique["PISTES"], $musique["STYLE"]);
        $musiqueRes->setId($musique['ID']);
        return $musiqueRes;
    }

    public function find(): PDOStatement
    {
        $stmt=$this->executePrepare("select * from musique",[]);
        return $stmt;
    }

    public function findAll(int $pdoFecthMode): array
    {
        $stmt=$this->find();
        $musiques = $stmt->fetchAll($pdoFecthMode);

        $musiquesRes=[];
        foreach($musiques as $musique) {
            $musiqueRes = new Musique($musique["TITRE"], $musique["STOCK"], $musique["IMAGE"], $musique["ARTISTE"], $musique["ANNEESORTIE"], $musique["PISTES"], $musique["STYLE"]);
            $musiqueRes->setId($musique['ID']);
            $musiquesRes[] = $musiqueRes;
        }
        return $musiquesRes;
    }

    public function insert(Entity $e): PDOStatement
    {
        $req = "insert into MUSIQUE(TITRE, IMAGE, ARTISTE, ANNEESORTIE, STOCK, PISTES, STYLE) values (:titre, :image, :artiste, :anneesortie, :stock, :pistes, :style)";
        $params = array("titre" => $e->getTitre(), "image" => $e->getImage(), "artiste" => $e->getArtiste(),
            "anneesortie" => $e->getYear(), "stock" => $e->getStock(), "pistes" => $e->getNbPiste(), "style" => $e->getStyle());
        $res=$this->executePrepare($req,$params);
        return $res;
    }

    public function update(Entity $e): PDOStatement
    {
        $req = "update MUSIQUE SET titre=:titre, image=:image, artiste=:artiste, anneesortie=:anneesortie, stock=:stock, pistes=:pistes, style=:style WHERE id=:id";
        $params = array("titre" => $e->getTitre(), "image" => $e->getImage(), "artiste" => $e->getArtiste(),
            "anneesortie" => $e->getYear(), "stock" => $e->getStock(), "pistes" => $e->getNbPiste(), "style" => $e->getStyle(), "id"=>$e->getId());
        $res=$this->executePrepare($req,$params);
        return $res;
    }

    public function delete(Entity $e) : PDOStatement
    {
        $req = "DELETE FROM MUSIQUE WHERE id=:id";
        $params = array("id"=>$e->getId());
        $res=$this->executePrepare($req,$params);
        return $res;
    }


}