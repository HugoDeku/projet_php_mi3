<?php


namespace mvc\model\business;
require_once ("PDOBusiness.php");
require_once (__DIR__.'/../entities/Livre.php');
require_once (__DIR__.'/../entities/Entity.php');


use mvc\model\entities\Entity;
use mvc\model\entities\Livre;
use PDOStatement;



class LivreBusiness extends PDOBusiness
{
    public function findById(int $id): ?Entity
    {
        $stmt = $this->executePrepare("select * from livre where id=:id", [ "id" => $id]);
        $livre = $stmt->fetch();
        if (!$livre) return null;
        $livreRes = new Livre($livre["TITRE"], $livre["IMAGE"], $livre["STOCK"], $livre["ANNEESORTIE"], $livre["AUTEUR"]
            , $livre["TYPE"], $livre["PAGES"]);
        $livreRes->setId($livre['ID']);
        return $livreRes;
    }

    public function find(): PDOStatement
    {
        $stmt=$this->executePrepare("select * from livre",[]);
        return $stmt;
    }

    public function findAll(int $pdoFecthMode): array
    {
        $stmt=$this->find();
        $livres = $stmt->fetchAll($pdoFecthMode);

        $livresRes=[];
        foreach($livres as $livre) {
            $livreRes = new Livre($livre["TITRE"], $livre["IMAGE"], $livre["STOCK"], $livre["ANNEESORTIE"], $livre["AUTEUR"]
                , $livre["TYPE"], $livre["PAGES"]);
            $livreRes->setId($livre['ID']);
            $livresRes[] = $livreRes;
        }
        return $livresRes;
    }

    public function insert(Entity $e): PDOStatement
    {
        $req = "insert into LIVRE(TITRE, IMAGE, AUTEUR, ANNEESORTIE, STOCK, TYPE, PAGES) values (:titre, :image, :auteur,
                                                                                 :anneesortie, :stock, :type, :pages)";
        $params = array("titre" => $e->getTitre(), "image" => $e->getImage(), "auteur" => $e->getAuteur(),
            "anneesortie" => $e->getYear(), "stock" => $e->getStock(), "type" => $e->getType(), "pages"=>$e->getPages());
        $res=$this->executePrepare($req,$params);
        return $res;
    }

}