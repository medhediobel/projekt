<?php

namespace App\Entity;

use App\Repository\BehoerdeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BehoerdeRepository::class)
 */
class Behoerde
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
    private $typ;

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
     * @ORM\OneToMany(targetEntity=Vertreta::class, mappedBy="behoerde")
     */
    private $vertreta;

    public function __construct()
    {
        $this->vertreta = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTyp(): ?string
    {
        return $this->typ;
    }

    public function setTyp(string $typ): self
    {
        $this->typ = $typ;

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

    /**
     * @return Collection|Vertreta[]
     */
    public function getVertreta(): Collection
    {
        return $this->vertreta;
    }

    public function addVertretum(Vertreta $vertretum): self
    {
        if (!$this->vertreta->contains($vertretum)) {
            $this->vertreta[] = $vertretum;
            $vertretum->setBehoerde($this);
        }

        return $this;
    }

    public function removeVertretum(Vertreta $vertretum): self
    {
        if ($this->vertreta->removeElement($vertretum)) {
            // set the owning side to null (unless already changed)
            if ($vertretum->getBehoerde() === $this) {
                $vertretum->setBehoerde(null);
            }
        }

        return $this;
    }
}
