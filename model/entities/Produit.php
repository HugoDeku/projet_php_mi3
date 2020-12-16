<?php

namespace mvc\model\entities;

require_once('Entity.php');

abstract class Produit extends Entity
{
    private $titre;
    private $image;

    /**
     * Produit constructor.
     * @param $titre
     */

    public function __construct(string $titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image)
    {
        $this->image = $image;
    }



}