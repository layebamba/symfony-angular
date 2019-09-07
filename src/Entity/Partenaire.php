<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\PartenaireRepository")
 */
class Partenaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"partenaires"})
     * @ORM\Column(type="string", length=255)
     */
    private $nomAgence;

    /**
     * @Groups({"partenaires"})
     * @ORM\Column(type="string", length=255)
     */
    private $ninea;

    /**
     * @Groups({"partenaires"})
     * @ORM\Column(type="string", length=255)
     */
    private $registre;

    /**
     * @Groups({"partenaires"})
     * @ORM\Column(type="string", length=255)
     */
    private $lieu;

    /**
     * @Groups({"partenaires"})
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    /**
     * @Groups({"partenaires"})
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="partenaire")
     */
    private $partenaire;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Compte", mappedBy="partenaire")
     */
    private $creer;

    public function __construct()
    {
        $this->partenaire = new ArrayCollection();
        $this->creer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAgence(): ?string
    {
        return $this->nomAgence;
    }

    public function setNomAgence(string $nomAgence): self
    {
        $this->nomAgence = $nomAgence;

        return $this;
    }

    public function getNinea(): ?string
    {
        return $this->ninea;
    }

    public function setNinea(string $ninea): self
    {
        $this->ninea = $ninea;

        return $this;
    }

    public function getRegistre(): ?string
    {
        return $this->registre;
    }

    public function setRegistre(string $registre): self
    {
        $this->registre = $registre;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getPartenaire(): Collection
    {
        return $this->partenaire;
    }

    public function addPartenaire(User $partenaire): self
    {
        if (!$this->partenaire->contains($partenaire)) {
            $this->partenaire[] = $partenaire;
            $partenaire->setPartenaire($this);
        }

        return $this;
    }

    public function removePartenaire(User $partenaire): self
    {
        if ($this->partenaire->contains($partenaire)) {
            $this->partenaire->removeElement($partenaire);
            // set the owning side to null (unless already changed)
            if ($partenaire->getPartenaire() === $this) {
                $partenaire->setPartenaire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Compte[]
     */
    public function getCreer(): Collection
    {
        return $this->creer;
    }

    public function addCreer(Compte $creer): self
    {
        if (!$this->creer->contains($creer)) {
            $this->creer[] = $creer;
            $creer->setPartenaire($this);
        }

        return $this;
    }

    public function removeCreer(Compte $creer): self
    {
        if ($this->creer->contains($creer)) {
            $this->creer->removeElement($creer);
            // set the owning side to null (unless already changed)
            if ($creer->getPartenaire() === $this) {
                $creer->setPartenaire(null);
            }
        }

        return $this;
    }
}
