<?php


namespace mvc\model\entities;

require_once('Produit.php');
abstract class ProduitStock extends Produit
{
    private $stock;
    private $year;

    /**
     * Produit constructor.
     * @param string $titre
     * @param int $stock
     * @param int $year
     */

    public function __construct(string $titre, int $stock, int $year)
    {
        parent::__construct($titre);
        $this->stock = $stock;
        $this->year = $year;
    }

    /**
     * @return int
     */
    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * @param int $stock
     */
    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }


}