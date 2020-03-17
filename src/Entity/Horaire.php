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
     * @ORM\Column(type="string", nullable=true)
     */
    private $heureMatinOuverture;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $heureMatinFermeture;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $heureApresMidiOuverture;

    /**
     * @ORM\Column(type="string", nullable=true)
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

    public function getHeureMatinOuverture(): ?string
    {
        return $this->heureMatinOuverture;
    }

    public function setHeureMatinOuverture(?string $heureMatinOuverture): self
    {
        $this->heureMatinOuverture = $heureMatinOuverture;

        return $this;
    }

    public function getHeureMatinFermeture(): ?string
    {
        return $this->heureMatinFermeture;
    }

    public function setHeureMatinFermeture(?string $heureMatinFermeture): self
    {
        $this->heureMatinFermeture = $heureMatinFermeture;

        return $this;
    }

    public function getHeureApresMidiOuverture(): ?string
    {
        return $this->heureApresMidiOuverture;
    }

    public function setHeureApresMidiOuverture(?int $heureApresMidiOuverture): self
    {
        $this->heureApresMidiOuverture = $heureApresMidiOuverture;

        return $this;
    }

    public function getHeureApresMidiFermeture(): ?string
    {
        return $this->heureApresMidiFermeture;
    }

    public function setHeureApresMidiFermeture(?string $heureApresMidiFermeture): self
    {
        $this->heureApresMidiFermeture = $heureApresMidiFermeture;

        return $this;
    }
}
