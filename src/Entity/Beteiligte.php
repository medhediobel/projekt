<?php

namespace App\Entity;

use App\Repository\BeteiligteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BeteiligteRepository::class)
 */
class Beteiligte
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nachname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $benutzername;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telefon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="integer")
     */
    private $codepost;

    /**
     * @ORM\Column(type="float")
     */
    private $ordnum;

    /**
     * @ORM\Column(type="text")
     */
    private $wiederspruche;

    /**
     * @ORM\Column(type="text")
     */
    private $vollmacht;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNachname(): ?string
    {
        return $this->nachname;
    }

    public function setNachname(string $nachname): self
    {
        $this->nachname = $nachname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getBenutzername(): ?string
    {
        return $this->benutzername;
    }

    public function setBenutzername(string $benutzername): self
    {
        $this->benutzername = $benutzername;

        return $this;
    }

    public function getTelefon(): ?string
    {
        return $this->telefon;
    }

    public function setTelefon(string $telefon): self
    {
        $this->telefon = $telefon;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCodepost(): ?int
    {
        return $this->codepost;
    }

    public function setCodepost(int $codepost): self
    {
        $this->codepost = $codepost;

        return $this;
    }

    public function getOrdnum(): ?float
    {
        return $this->ordnum;
    }

    public function setOrdnum(float $ordnum): self
    {
        $this->ordnum = $ordnum;

        return $this;
    }

    public function getWiederspruche(): ?string
    {
        return $this->wiederspruche;
    }

    public function setWiederspruche(string $wiederspruche): self
    {
        $this->wiederspruche = $wiederspruche;

        return $this;
    }

    public function getVollmacht(): ?string
    {
        return $this->vollmacht;
    }

    public function setVollmacht(string $vollmacht): self
    {
        $this->vollmacht = $vollmacht;

        return $this;
    }
}
