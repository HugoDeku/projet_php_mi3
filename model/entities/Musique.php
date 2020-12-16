<?php


namespace mvc\model\entities;

require_once('ProduitStock.php');
class Musique extends ProduitStock
{
    private $artiste;
    private $nbPiste;
    private $style;

    /**
     * Musique constructor.
     * @param string $titre
     * @param int $stock
     * @param string $image
     * @param string $artiste
     * @param int $anneeSortie
     * @param int $nbPiste
     * @param string $style
     */
    public function __construct(string $titre, int $stock,string $image, string $artiste, int $anneeSortie, int $nbPiste, string $style)
    {
        parent::__construct($titre, $stock, $anneeSortie);
        $this->setImage("view/data/musique/" . $image);
        $this->artiste = $artiste;
        $this->nbPiste = $nbPiste;
        $this->style = $style;
    }

    /**
     * @return string
     */
    public function getArtiste(): string
    {
        return $this->artiste;
    }

    /**
     * @param string $artiste
     */
    public function setArtiste(string $artiste): void
    {
        $this->artiste = $artiste;
    }

    /**
     * @return int
     */
    public function getNbPiste(): int
    {
        return $this->nbPiste;
    }

    /**
     * @param int $nbPiste
     */
    public function setNbPiste(int $nbPiste): void
    {
        $this->nbPiste = $nbPiste;
    }

    /**
     * @return string
     */
    public function getStyle(): string
    {
        return $this->style;
    }

    /**
     * @param string $style
     */
    public function setStyle(string $style): void
    {
        $this->style = $style;
    }






}