<?php

namespace App\Entity;

use App\Repository\EmployeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeRepository::class)]
class Employe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 64)]
    private ?string $nom = null;

    #[ORM\Column(length: 64)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column]
    private ?bool $syncReseda = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $page_pro = null;

    #[ORM\Column(nullable: true)]
    private ?int $idhal = null;

    #[ORM\Column(nullable: true)]
    private ?int $orcid = null;

    #[ORM\Column(length: 128, nullable: true)]
    private ?string $mail_secondaire = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $telephone_secondaire = null;

    #[ORM\Column(nullable: true)]
    private ?int $annee_naissance = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function isSyncReseda(): ?bool
    {
        return $this->syncReseda;
    }

    public function setSyncReseda(bool $syncReseda): static
    {
        $this->syncReseda = $syncReseda;

        return $this;
    }

    public function getPagePro(): ?string
    {
        return $this->page_pro;
    }

    public function setPagePro(?string $page_pro): static
    {
        $this->page_pro = $page_pro;

        return $this;
    }

    public function getIdhal(): ?int
    {
        return $this->idhal;
    }

    public function setIdhal(?int $idhal): static
    {
        $this->idhal = $idhal;

        return $this;
    }

    public function getOrcid(): ?int
    {
        return $this->orcid;
    }

    public function setOrcid(?int $orcid): static
    {
        $this->orcid = $orcid;

        return $this;
    }

    public function getMailSecondaire(): ?string
    {
        return $this->mail_secondaire;
    }

    public function setMailSecondaire(?string $mail_secondaire): static
    {
        $this->mail_secondaire = $mail_secondaire;

        return $this;
    }

    public function getTelephoneSecondaire(): ?string
    {
        return $this->telephone_secondaire;
    }

    public function setTelephoneSecondaire(?string $telephone_secondaire): static
    {
        $this->telephone_secondaire = $telephone_secondaire;

        return $this;
    }

    public function getAnneeNaissance(): ?int
    {
        return $this->annee_naissance;
    }

    public function setAnneeNaissance(?int $annee_naissance): static
    {
        $this->annee_naissance = $annee_naissance;

        return $this;
    }
}
