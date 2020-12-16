<?php


namespace mvc\model\entities;

require_once ("ProduitStock.php");
class Livre extends ProduitStock
{

    private $auteur;
    private $type;
    private $pages;

    /**
     * Livre constructor.
     * @param string $titre
     * @param string $image;
     * @param int $stock
     * @param int $year
     * @param string $auteur
     * @param string $type
     * @param int $pages
     */
    public function __construct(string $titre, string $image, int $stock, int $year, string $auteur, string $type, int $pages)
    {
        parent::__construct($titre, $stock, $year);
        $this->setImage("view/data/livre/" . $image);
        $this->auteur = $auteur;
        $this->type = $type;
        $this->pages = $pages;
    }

    /**
     * @return string
     */
    public function getAuteur(): string
    {
        return $this->auteur;
    }

    /**
     * @param string $auteur
     */
    public function setAuteur(string $auteur): void
    {
        $this->auteur = $auteur;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getPages(): int
    {
        return $this->pages;
    }

    /**
     * @param int $pages
     */
    public function setPages(int $pages): void
    {
        $this->pages = $pages;
    }




}