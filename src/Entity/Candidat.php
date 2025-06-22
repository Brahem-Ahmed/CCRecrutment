<?php

namespace App\Entity;

use App\Enums\UserRole;
use App\Repository\CandidatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidatRepository::class)]
class Candidat extends User
{

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $cv = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lettre_motivation = null;

    /**
     * @var Collection<int, Candidature>
     */
    #[ORM\OneToMany(targetEntity: Candidature::class, mappedBy: 'candidat', orphanRemoval: true)]
    private Collection $my_candidatures;

    public function __construct()
    {

        $this->my_candidatures = new ArrayCollection();
        $this->setRole(UserRole::CANDIDAT); // Auto-assign role
    }

    //Relationships





    //Getter and Setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(string $id): static
    {
        $this->id = $id;

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

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(string $cv): static
    {
        $this->cv = $cv;

        return $this;
    }

    public function getLettreMotivation(): ?string
    {
        return $this->lettre_motivation;
    }

    public function setLettreMotivation(?string $lettre_motivation): static
    {
        $this->lettre_motivation = $lettre_motivation;

        return $this;
    }

    /**
     * @return Collection<int, Candidature>
     */
    public function getMyCandidatures(): Collection
    {
        return $this->my_candidatures;
    }

    public function addMyCandidature(Candidature $myCandidature): static
    {
        if (!$this->my_candidatures->contains($myCandidature)) {
            $this->my_candidatures->add($myCandidature);
            $myCandidature->setCandidat($this);
        }

        return $this;
    }

    public function removeMyCandidature(Candidature $myCandidature): static
    {
        if ($this->my_candidatures->removeElement($myCandidature)) {
            // set the owning side to null (unless already changed)
            if ($myCandidature->getCandidat() === $this) {
                $myCandidature->setCandidat(null);
            }
        }

        return $this;
    }
}
