<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HoraireRepository")
 */
class Horaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Jour;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $heureMatinOuverture;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $heureMatinFermeture;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $heureApresMidiOuverture;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $heureApresMidiFermeture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?string
    {
        return $this->Jour;
    }

    public function setJour(string $Jour): self
    {
        $this->Jour = $Jour;

        return $this;
    }

    public function getHeureMatinOuverture(): ?int
    {
        return $this->heureMatinOuverture;
    }

    public function setHeureMatinOuverture(?int $heureMatinOuverture): self
    {
        $this->heureMatinOuverture = $heureMatinOuverture;

        return $this;
    }

    public function getHeureMatinFermeture(): ?int
    {
        return $this->heureMatinFermeture;
    }

    public function setHeureMatinFermeture(?int $heureMatinFermeture): self
    {
        $this->heureMatinFermeture = $heureMatinFermeture;

        return $this;
    }

    public function getHeureApresMidiOuverture(): ?int
    {
        return $this->heureApresMidiOuverture;
    }

    public function setHeureApresMidiOuverture(?int $heureApresMidiOuverture): self
    {
        $this->heureApresMidiOuverture = $heureApresMidiOuverture;

        return $this;
    }

    public function getHeureApresMidiFermeture(): ?int
    {
        return $this->heureApresMidiFermeture;
    }

    public function setHeureApresMidiFermeture(?int $heureApresMidiFermeture): self
    {
        $this->heureApresMidiFermeture = $heureApresMidiFermeture;

        return $this;
    }
}
