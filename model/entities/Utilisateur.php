<?php


namespace mvc\model\entities;

require_once ("Entity.php");
class Utilisateur extends Entity
{
    private $pseudo;
    private $email;
    private $motdepasse;
    private $isAdmin;

    /**
     * Utilisateur constructor.
     * @param string $pseudo
     * @param string $email
     * @param string $motdepasse
     * @param bool $isAdmin
     */
    public function __construct(string $pseudo, string $email, string $motdepasse, bool $isAdmin)
    {
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->motdepasse = $motdepasse;
        $this->isAdmin = $isAdmin;
    }

    /**
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     */
    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getMotdepasse(): string
    {
        return $this->motdepasse;
    }

    /**
     * @param string $motdepasse
     */
    public function setMotdepasse(string $motdepasse): void
    {
        $this->motdepasse = $motdepasse;
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->isAdmin;
    }

    /**
     * @param bool $isAdmin
     */
    public function setIsAdmin(bool $isAdmin): void
    {
        $this->isAdmin = $isAdmin;
    }




}