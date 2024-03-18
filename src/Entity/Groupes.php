<?php

namespace App\Entity;

use App\Repository\GroupesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupesRepository::class)]
class Groupes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 32)]
    private ?string $nom = null;

    #[ORM\Column(length: 8, nullable: true)]
    private ?string $acronyme = null;

    #[ORM\OneToOne(inversedBy: 'groupes', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Employe $responsable = null;

    #[ORM\ManyToMany(targetEntity: Employe::class, inversedBy: 'adjoints')]
    private Collection $adjoints;

    #[ORM\Column(length: 34)]
    private ?string $statut = null;

    #[ORM\OneToOne(mappedBy: 'groupe_principal', cascade: ['persist', 'remove'])]
    private ?Employe $employe = null;

    #[ORM\ManyToMany(targetEntity: Employe::class, mappedBy: 'groupes_secondaires')]
    private Collection $employes;

    public function __construct()
    {
        $this->adjoints = new ArrayCollection();
        $this->employes = new ArrayCollection();
    }

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

    public function getAcronyme(): ?string
    {
        return $this->acronyme;
    }

    public function setAcronyme(?string $acronyme): static
    {
        $this->acronyme = $acronyme;

        return $this;
    }

    public function getResponsable(): ?Employe
    {
        return $this->responsable;
    }

    public function setResponsable(Employe $responsable): static
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * @return Collection<int, Employe>
     */
    public function getAdjoints(): Collection
    {
        return $this->adjoints;
    }

    public function addAdjoint(Employe $adjoint): static
    {
        if (!$this->adjoints->contains($adjoint)) {
            $this->adjoints->add($adjoint);
        }

        return $this;
    }

    public function removeAdjoint(Employe $adjoint): static
    {
        $this->adjoints->removeElement($adjoint);

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getEmploye(): ?Employe
    {
        return $this->employe;
    }

    public function setEmploye(Employe $employe): static
    {
        // set the owning side of the relation if necessary
        if ($employe->getGroupePrincipal() !== $this) {
            $employe->setGroupePrincipal($this);
        }

        $this->employe = $employe;

        return $this;
    }

    /**
     * @return Collection<int, Employe>
     */
    public function getEmployes(): Collection
    {
        return $this->employes;
    }

    public function addEmploye(Employe $employe): static
    {
        if (!$this->employes->contains($employe)) {
            $this->employes->add($employe);
            $employe->addGroupesSecondaire($this);
        }

        return $this;
    }

    public function removeEmploye(Employe $employe): static
    {
        if ($this->employes->removeElement($employe)) {
            $employe->removeGroupesSecondaire($this);
        }

        return $this;
    }
}
