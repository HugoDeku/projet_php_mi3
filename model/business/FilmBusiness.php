<?php


namespace mvc\model\business;
require_once ("PDOBusiness.php");
require_once (__DIR__.'/../entities/Film.php');
require_once (__DIR__.'/../entities/Entity.php');


use mvc\model\entities\Entity;
use mvc\model\entities\Film;
use PDOStatement;



class FilmBusiness extends PDOBusiness
{
    public function findById(int $id): ?Entity
    {
        $stmt = $this->executePrepare("select * from film where id=:id", [ "id" => $id]);
        $film = $stmt->fetch();
        if (!$film) return null;
        $filmRes = new Film($film["TITRE"], $film["IMAGE"], $film["STOCK"], $film["ANNEESORTIE"], $film["REALISATEUR"]
            , $film["VEDETTE"]);
        $filmRes->setId($film['ID']);
        return $filmRes;
    }

    public function find(): PDOStatement
    {
        $stmt=$this->executePrepare("select * from film",[]);
        return $stmt;
    }

    public function findAll(int $pdoFecthMode): array
    {
        $stmt=$this->find();
        $films = $stmt->fetchAll($pdoFecthMode);

        $filmsRes=[];
        foreach($films as $film) {
            $filmRes = new Film($film["TITRE"], $film["IMAGE"], $film["STOCK"], $film["ANNEESORTIE"], $film["REALISATEUR"]
                , $film["VEDETTE"]);
            $filmRes->setId($film['ID']);
            $filmsRes[] = $filmRes;
        }
        return $filmsRes;
    }

    public function insert(Entity $e): PDOStatement
    {
        $req = "insert into Film(TITRE, IMAGE, REALISATEUR, ANNEESORTIE, STOCK, VEDETTE) values (:titre, :image, :realisateur, :anneesortie, :stock, :vedette)";
        $params = array("titre" => $e->getTitre(), "image" => $e->getImage(), "realisateur" => $e->getRealisateur(),
            "anneesortie" => $e->getYear(), "stock" => $e->getStock(), "vedette" => $e->getActeur());
        $res=$this->executePrepare($req,$params);
        return $res;
    }

}