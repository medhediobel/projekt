<?php

namespace App\Entity;

use App\Repository\EinwendungRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EinwendungRepository::class)
 */
class Einwendung
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
    private $verfahrennummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $v_art;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $v_name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $verfasser;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $abteilung;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $anhange;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $aktenzeichen;

    /**
     * @ORM\Column(type="string")
     */
    private $File;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVerfahrennummer(): ?string
    {
        return $this->verfahrennummer;
    }

    public function setVerfahrennummer(string $verfahrennummer): self
    {
        $this->verfahrennummer = $verfahrennummer;

        return $this;
    }

    public function getVArt(): ?string
    {
        return $this->v_art;
    }

    public function setVArt(string $v_art): self
    {
        $this->v_art = $v_art;

        return $this;
    }

    public function getVName(): ?string
    {
        return $this->v_name;
    }

    public function setVName(string $v_name): self
    {
        $this->v_name = $v_name;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getVerfasser(): ?string
    {
        return $this->verfasser;
    }

    public function setVerfasser(string $verfasser): self
    {
        $this->verfasser = $verfasser;

        return $this;
    }

    public function getAbteilung(): ?string
    {
        return $this->abteilung;
    }

    public function setAbteilung(string $abteilung): self
    {
        $this->abteilung = $abteilung;

        return $this;
    }

    public function getAnhange(): ?string
    {
        return $this->anhange;
    }

    public function setAnhange(?string $anhange): self
    {
        $this->anhange = $anhange;

        return $this;
    }

    public function getAktenzeichen(): ?string
    {
        return $this->aktenzeichen;
    }

    public function setAktenzeichen(string $aktenzeichen): self
    {
        $this->aktenzeichen = $aktenzeichen;

        return $this;
    }

    public function getFile()
    {
        return $this->File;
    }

    public function setFile($File)
    {
        $this->File = $File;

        return $this;
    }
}
