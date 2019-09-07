<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\CompteRepository")
 */
class Compte
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
    private $numerocompte;

    /**
     * @ORM\Column(type="integer", length=255)
     */
    private $montant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partenaire", inversedBy="creer")
     */
    private $partenaire;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Depot", mappedBy="compte")
     */
    private $faire;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Depot", mappedBy="alimenter")
     */
    private $avoir;

   

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="user")
     */
    private $users;

    public function __construct()
    {
        $this->faire = new ArrayCollection();
        $this->avoir = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumerocompte(): ?string
    {
        return $this->numerocompte;
    }

    public function setNumerocompte(string $numerocompte): self
    {
        $this->numerocompte = $numerocompte;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getPartenaire(): ?Partenaire
    {
        return $this->partenaire;
    }

    public function setPartenaire(?Partenaire $partenaire): self
    {
        $this->partenaire = $partenaire;

        return $this;
    }

    /**
     * @return Collection|Depot[]
     */
    public function getFaire(): Collection
    {
        return $this->faire;
    }

    public function addFaire(Depot $faire): self
    {
        if (!$this->faire->contains($faire)) {
            $this->faire[] = $faire;
            $faire->setCompte($this);
        }

        return $this;
    }

    public function removeFaire(Depot $faire): self
    {
        if ($this->faire->contains($faire)) {
            $this->faire->removeElement($faire);
            // set the owning side to null (unless already changed)
            if ($faire->getCompte() === $this) {
                $faire->setCompte(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Depot[]
     */
    public function getAvoir(): Collection
    {
        return $this->avoir;
    }

    public function addAvoir(Depot $avoir): self
    {
        if (!$this->avoir->contains($avoir)) {
            $this->avoir[] = $avoir;
            $avoir->setAlimenter($this);
        }

        return $this;
    }

    public function removeAvoir(Depot $avoir): self
    {
        if ($this->avoir->contains($avoir)) {
            $this->avoir->removeElement($avoir);
            // set the owning side to null (unless already changed)
            if ($avoir->getAlimenter() === $this) {
                $avoir->setAlimenter(null);
            }
        }

        return $this;
    }

    // public function getCompte(): ?User
    // {
    //     return $this->compte;
    // }

    // public function setCompte(?User $compte): self
    // {
    //     $this->compte = $compte;

    //     return $this;
    // }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setUser($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getUser() === $this) {
                $user->setUser(null);
            }
        }

        return $this;
    }
}
