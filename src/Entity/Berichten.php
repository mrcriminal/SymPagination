<?php

namespace App\Entity;

use App\Repository\BerichtenRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BerichtenRepository::class)
 */
class Berichten
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $nieuws;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Antwoorden;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNieuws(): ?string
    {
        return $this->nieuws;
    }

    public function setNieuws(?string $nieuws): self
    {
        $this->nieuws = $nieuws;

        return $this;
    }

    public function getAntwoorden(): ?string
    {
        return $this->Antwoorden;
    }

    public function setAntwoorden(?string $Antwoorden): self
    {
        $this->Antwoorden = $Antwoorden;

        return $this;
    }
}
