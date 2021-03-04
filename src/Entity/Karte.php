<?php

namespace App\Entity;

use App\Repository\KarteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KarteRepository::class)
 */
class Karte
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ort;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bilder;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrt(): ?string
    {
        return $this->ort;
    }

    public function setOrt(string $ort): self
    {
        $this->ort = $ort;

        return $this;
    }

    public function getBilder(): ?string
    {
        return $this->bilder;
    }

    public function setBilder(string $bilder): self
    {
        $this->bilder = $bilder;

        return $this;
    }
}
