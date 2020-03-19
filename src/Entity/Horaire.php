<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HoraireRepository")
 */
class Horaire
{

    const HEURE_MATIN = [
        'Fermer' => 'Fermer',
        '8 h' =>'8 h',
        '8 h 30'=> '8 h 30',
        '9 h' =>'9 h',
        '9 h 30'=> '9 h 30',
        '10 h' => '10 h',
        '10 h 30'=> '10 h 30',
        '11 h' => '11 h',
        '11 h 30'=> '11 h 30',
        '12 h' => '12 h'
    ];
    const HEURE_AP_MIDI = [
        'Fermer' => 'Fermer',
        '13 h' =>'13 h',
        '13 h 30'=> '13 h 30',
        '14 h' =>'14 h',
        '14 h 30'=> '14 h 30',
        '15 h' =>'15 h',
        '15 h 30'=> '15 h 30',
        '16 h' => '16 h',
        '16 h 30'=> '16 h 30',
        '17 h' => '17 h',
        '17 h 30'=> '17 h 30',
        '18 h' => '18h',
        '18 h 30'=> '18 h 30',
        '19 h' => '19 h'
    ];

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

    public function setHeureApresMidiOuverture(?string $heureApresMidiOuverture): self
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
