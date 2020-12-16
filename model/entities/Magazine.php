<?php


namespace mvc\model\entities;

require_once("Produit.php");
class Magazine extends Produit
{
    private $numero;
    private $dateParution;
    private $periodicite;

    /**
     * Musique constructor.
     * @param string $titre
     * @param string $image
     * @param int $numero
     * @param int $dateParution;
     * @param int $periodicite;
     */
    public function __construct(string $titre,string $image, int $numero, int $dateParution, int $periodicite)
    {
        parent::__construct($titre);
        $this->setImage("view/data/magazine/" . $image);
        $this->numero = $numero;
        $this->dateParution = $dateParution;
        $this->periodicite = $periodicite;
    }

    /**
     * @return int
     */
    public function getNumero(): int
    {
        return $this->numero;
    }

    /**
     * @param int $numero
     */
    public function setNumero(int $numero): void
    {
        $this->numero = $numero;
    }

    /**
     * @return int
     */
    public function getDateParution(): int
    {
        return $this->dateParution;
    }

    /**
     * @param int $dateParution
     */
    public function setDateParution(int $dateParution): void
    {
        $this->dateParution = $dateParution;
    }

    /**
     * @return int
     */
    public function getPeriodicite(): int
    {
        return $this->periodicite;
    }

    /**
     * @param int $periodicite
     */
    public function setPeriodicite(int $periodicite): void
    {
        $this->periodicite = $periodicite;
    }


}