<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TransactionRepository")
 */
class Transaction
{
    /**
     * @Groups({"transactions"})
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"transactions"})
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @Groups({"transactions"})
     * @ORM\Column(type="string", length=255)
     */
    private $nomexp;

    /**
     * @Groups({"transactions"})
     * @ORM\Column(type="string", length=255)
     */
    private $prenomexp;

    /**
     * @Groups({"transactions"})
     * @ORM\Column(type="integer")
     */
    private $telexp;

    /**
     * @Groups({"transactions"})
     * @ORM\Column(type="integer")
     */
    private $envoiTarif;

    /**
     * @Groups({"transactions"})
     * @ORM\Column(type="integer")
     */
    private $retraitTarif;

    /**
     * @Groups({"transactions"})
     * @ORM\Column(type="integer")
     */
    private $etatTarif;

    /**
     * @Groups({"transactions"})
     * @ORM\Column(type="integer")
     */
    private $wariTarif;

     /**
      * @Groups({"transactions"})
     * @ORM\Column(type="integer")
     */
    private $mtntenvoi;

    // /**
    //  * @ORM\Column(type="integer")
    //  */
    // private $montantenvoyer;

    /**
     * @Groups({"transactions"})
     * @ORM\Column(type="string", length=255)
     */
    private $nomrecep;

    /**
     * @Groups({"transactions"})
     * @ORM\Column(type="string", length=255)
     */
    private $prenomrecep;

    /**
     * @Groups({"transactions"})
     * @ORM\Column(type="integer")
     */
    private $telrecep;

    /**
     * @Groups({"transactions"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cni;

    /**
     * @Groups({"transactions"})
     * @ORM\Column(type="string", length=255)
     */
    private $codenvoi;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="transaction")
     */
    private $user;

    /**
     * @Groups({"transactions"})
     * @ORM\Column(type="integer")
     */
    private $montanttotal;

    /**
     * @Groups({"transactions"})
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateretrait;

    /**
     * @Groups({"transactions"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cniretrait;

    /**
     * @Groups({"transactions"})
     * @ORM\Column(type="string", length=255)
     */
    private $Etat;

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getNomexp(): ?string
    {
        return $this->nomexp;
    }

    public function setNomexp(string $nomexp): self
    {
        $this->nomexp = $nomexp;

        return $this;
    }

    public function getPrenomexp(): ?string
    {
        return $this->prenomexp;
    }

    public function setPrenomexp(string $prenomexp): self
    {
        $this->prenomexp = $prenomexp;

        return $this;
    }

    public function getTelexp(): ?int
    {
        return $this->telexp;
    }

    public function setTelexp(int $telexp): self
    {
        $this->telexp = $telexp;

        return $this;
    }

    public function getEnvoiTarif(): ?int
    {
        return $this->envoiTarif;
    }

    public function setEnvoiTarif(int $envoiTarif): self
    {
        $this->envoiTarif = $envoiTarif;

        return $this;
    }

    public function getRetraitTarif(): ?int
    {
        return $this->retraitTarif;
    }

    public function setRetraitTarif(int $retraitTarif): self
    {
        $this->retraitTarif = $retraitTarif;

        return $this;
    }

    public function getEtatTarif(): ?int
    {
        return $this->etatTarif;
    }

    public function setEtatTarif(int $etatTarif): self
    {
        $this->etatTarif = $etatTarif;

        return $this;
    }

    public function getWariTarif(): ?int
    {
        return $this->wariTarif;
    }

    public function setWariTarif(int $wariTarif): self
    {
        $this->wariTarif = $wariTarif;

        return $this;
    }
    public function getMtntenvoi(): ?int
    {
        return $this->mtntenvoi;
    }

    public function setMtntenvoi(int $mtntenvoi): self
    {
        $this->mtntenvoi = $mtntenvoi;

        return $this;
    }

    // public function getMontantenvoyer(): ?int
    // {
    //     return $this->montantenvoyer;
    // }

    // public function setMontantenvoyer(int $montantenvoyer): self
    // {
    //     $this->montant = $montantenvoyer;

    //     return $this;
    // }

    public function getNomrecep(): ?string
    {
        return $this->nomrecep;
    }

    public function setNomrecep(string $nomrecep): self
    {
        $this->nomrecep = $nomrecep;

        return $this;
    }

    public function getPrenomrecep(): ?string
    {
        return $this->prenomrecep;
    }

    public function setPrenomrecep(string $prenomrecep): self
    {
        $this->prenomrecep = $prenomrecep;

        return $this;
    }

    public function getTelrecep(): ?int
    {
        return $this->telrecep;
    }

    public function setTelrecep(int $telrecep): self
    {
        $this->telrecep = $telrecep;

        return $this;
    }

    public function getCni(): ?string
    {
        return $this->cni;
    }

    public function setCni(?string $cni): self
    {
        $this->cni = $cni;

        return $this;
    }

    public function getCodenvoi(): ?string
    {
        return $this->codenvoi;
    }

    public function setCodenvoi(string $codenvoi): self
    {
        $this->codenvoi = $codenvoi;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getMontanttotal(): ?int
    {
        return $this->montanttotal;
    }

    public function setMontanttotal(int $montanttotal): self
    {
        $this->montanttotal = $montanttotal;

        return $this;
    }

    public function getDateretrait(): ?\DateTimeInterface
    {
        return $this->dateretrait;
    }

    public function setDateretrait(?\DateTimeInterface $dateretrait): self
    {
        $this->dateretrait = $dateretrait;

        return $this;
    }

    public function getCniretrait(): ?string
    {
        return $this->cniretrait;
    }

    public function setCniretrait(?string $cniretrait): self
    {
        $this->cniretrait = $cniretrait;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->Etat;
    }

    public function setEtat(string $Etat): self
    {
        $this->Etat = $Etat;

        return $this;
    }

   
}
