<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TarifRepository")
 */
class Tarif
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $borneinferieure;

    /**
     * @ORM\Column(type="integer")
     */
    private $bornesuperieure;

    /**
     * @ORM\Column(type="integer")
     */
    private $valeur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBorneinferieure(): ?int
    {
        return $this->borneinferieure;
    }

    public function setBorneinferieure(int $borneinferieure): self
    {
        $this->borneinferieure = $borneinferieure;

        return $this;
    }

    public function getBornesuperieure(): ?int
    {
        return $this->bornesuperieure;
    }

    public function setBornesuperieure(int $bornesuperieure): self
    {
        $this->bornesuperieure = $bornesuperieure;

        return $this;
    }

    public function getValeur(): ?int
    {
        return $this->valeur;
    }

    public function setValeur(int $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }
}
