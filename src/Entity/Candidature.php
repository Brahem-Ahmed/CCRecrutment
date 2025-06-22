<?php

namespace App\Entity;

use App\Enums\Status_Candidature;
use App\Repository\CandidatureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidatureRepository::class)]
class Candidature
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $date_candidature = null;

    #[ORM\Column(length: 255)]
    private ?string $cv_joint = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lettre_motivation_joint = null;

    #[ORM\Column(enumType: Status_Candidature::class)]
    private ?Status_Candidature $statut = null;

    #[ORM\ManyToOne(inversedBy: 'my_candidatures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Candidat $candidat = null;

    #[ORM\ManyToOne(inversedBy: 'candidatures')]
    private ?OffreEmploi $offre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getDateCandidature(): ?\DateTime
    {
        return $this->date_candidature;
    }

    public function setDateCandidature(\DateTime $date_candidature): static
    {
        $this->date_candidature = $date_candidature;

        return $this;
    }

    public function getCvJoint(): ?string
    {
        return $this->cv_joint;
    }

    public function setCvJoint(string $cv_joint): static
    {
        $this->cv_joint = $cv_joint;

        return $this;
    }

    public function getLettreMotivationJoint(): ?string
    {
        return $this->lettre_motivation_joint;
    }

    public function setLettreMotivationJoint(?string $lettre_motivation_joint): static
    {
        $this->lettre_motivation_joint = $lettre_motivation_joint;

        return $this;
    }

    public function getStatut(): ?Status_Candidature
    {
        return $this->statut;
    }

    public function setStatut(Status_Candidature $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getCandidat(): ?Candidat
    {
        return $this->candidat;
    }

    public function setCandidat(?Candidat $candidat): static
    {
        $this->candidat = $candidat;

        return $this;
    }

    public function getOffre(): ?OffreEmploi
    {
        return $this->offre;
    }

    public function setOffre(?OffreEmploi $offre): static
    {
        $this->offre = $offre;

        return $this;
    }
}
