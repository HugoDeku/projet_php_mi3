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
     * @param string $numero
     * @param string $dateParution;
     * @param int $periodicite;
     */
    public function __construct(string $titre,string $image, string $numero, string $dateParution, int $periodicite)
    {
        parent::__construct($titre);
        $this->setImage("./view/data/magazine/".$image);
        $this->numero = $numero;
        $this->dateParution = $dateParution;
        $this->periodicite = $periodicite;
    }

    /**
     * @return string
     */
    public function getNumero(): string
    {
        return $this->numero;
    }

    /**
     * @param string $numero
     */
    public function setNumero(string $numero): void
    {
        $this->numero = $numero;
    }

    /**
     * @return string
     */
    public function getDateParution(): string
    {
        return $this->dateParution;
    }

    /**
     * @param string $dateParution
     */
    public function setDateParution(string $dateParution): void
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