<?php


namespace mvc\model\entities;

require_once ("Entity.php");
class Emprunt extends Entity
{
    private $utilisateurId;
    private $produitId;
    private $type;
    private $date;

    /**
     * Emprunt constructor.
     * @param int $utilisateurId
     * @param int $produitId
     * @param string $type
     * @param string $date
     */
    public function __construct(int $utilisateurId, int $produitId, string $type, string $date)
    {
        $this->utilisateurId = $utilisateurId;
        $this->produitId = $produitId;
        $this->type = $type;
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getUtilisateurId(): int
    {
        return $this->utilisateurId;
    }

    /**
     * @param int $utilisateurId
     */
    public function setUtilisateurId(int $utilisateurId): void
    {
        $this->utilisateurId = $utilisateurId;
    }

    /**
     * @return int
     */
    public function getProduitId(): int
    {
        return $this->produitId;
    }

    /**
     * @param int $produitId
     */
    public function setProduitId(int $produitId): void
    {
        $this->produitId = $produitId;
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
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }


}