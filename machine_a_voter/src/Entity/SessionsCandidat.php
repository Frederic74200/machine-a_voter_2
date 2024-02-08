<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SessionsCandidatRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionsCandidatRepository::class)]
#[ApiResource]
class SessionsCandidat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'session')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Candidat $candidat = null;

    #[ORM\ManyToOne(inversedBy: 'candidat')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SessionsVote $session = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSession(): ?SessionsVote
    {
        return $this->session;
    }

    public function setSession(?SessionsVote $session): static
    {
        $this->session = $session;

        return $this;
    }
}
