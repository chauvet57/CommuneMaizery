<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TelephoneRepository")
 */
class Telephone
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
    private $Village;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numeroTelephone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVillage(): ?string
    {
        return $this->Village;
    }

    public function setVillage(string $Village): self
    {
        $this->Village = $Village;

        return $this;
    }

    public function getNumeroTelephone(): ?string
    {
        return $this->numeroTelephone;
    }

    public function setNumeroTelephone(string $numeroTelephone): self
    {
        $this->numeroTelephone = $numeroTelephone;

        return $this;
    }
}
