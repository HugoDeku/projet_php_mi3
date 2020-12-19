<?php
namespace mvc\controller;

require_once(__DIR__.'/../model/business/PDOBusiness.php');

use mvc\model\entities\Entity;
use mvc\model\business\PDOBusiness;
use \PDOStatement;
use \PDO;

abstract class AController
{
    //protected PDOManager $manager;
    protected $business;

    /**
     * @return PDOBusiness
     */
    public function getBusiness(): PDOBusiness
    {
        return $this->business;
    }

    /**
     * @param PDOBusiness $manager
     */
    public function setBusiness(PDOBusiness $business): void
    {
        $this->business = $business;
    }

    /**
     * @param int $id
     * @return Entity
     */
    public function findById(int $id): ?Entity
    {
        return($this->getManager()->findById($id));
    }

    /**
     * @return PDOStatement
     */
    public function find(): PDOStatement
    {
        return($this->getManager()->find());
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return($this->getManager()->findAll(PDO::FETCH_ASSOC));
    }

    /**
     * @param Entity $o
     */
    public function insert(Entity $e): void
    {
        $this->getManager()->insert($e);
    }
}