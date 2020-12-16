<?php


namespace mvc\model\entities;

require_once("ProduitStock.php");
class Film extends ProduitStock
{

    private $realisateur;
    private $acteur;

    /**
     * Film constructor.
     * @param string $titre
     * @param string $image;
     * @param int $stock
     * @param int $year
     * @param string $realisateur
     * @param string $acteur
     */

    public function __construct(string $titre, string $image, int $stock, int $year,string $realisateur,string $acteur)
    {
        parent::__construct($titre, $stock, $year);
        $this->setImage("view/data/film/" . $image);
        $this->realisateur = $realisateur;
        $this->acteur = $acteur;
    }

    /**
     * @return string
     */
    public function getRealisateur(): string
    {
        return $this->realisateur;
    }

    /**
     * @param string $realisateur
     */
    public function setRealisateur(string $realisateur): void
    {
        $this->realisateur = $realisateur;
    }

    /**
     * @return string
     */
    public function getActeur(): string
    {
        return $this->acteur;
    }

    /**
     * @param string $acteur
     */
    public function setActeur(string $acteur): void
    {
        $this->acteur = $acteur;
    }




}