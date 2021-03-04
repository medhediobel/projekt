<?php

namespace App\Entity;

use App\Repository\VerfahrenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VerfahrenRepository::class)
 */
class Verfahren
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
     * @ORM\Column(type="integer")
     */
    private $nummer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $art;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $groesse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $kosten;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $finanzierung;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ort;

    /**
     * @ORM\OneToMany(targetEntity=Planes::class, mappedBy="verfahren")
     */
    private $planes;

    /**
     * @ORM\Column(type="float", scale=4, precision=6)
     */
    private $lat;

    /**
     * @ORM\Column(type="float", scale=4, precision=7)
     */
    private $lng;

    public function __construct()
    {
        $this->planes = new ArrayCollection();
    }

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

    public function getNummer(): ?int
    {
        return $this->nummer;
    }

    public function setNummer(int $nummer): self
    {
        $this->nummer = $nummer;

        return $this;
    }

    public function getArt(): ?string
    {
        return $this->art;
    }

    public function setArt(string $art): self
    {
        $this->art = $art;

        return $this;
    }

    public function getGroesse(): ?string
    {
        return $this->groesse;
    }

    public function setGroesse(string $groesse): self
    {
        $this->groesse = $groesse;

        return $this;
    }

    public function getKosten(): ?string
    {
        return $this->kosten;
    }

    public function setKosten(string $kosten): self
    {
        $this->kosten = $kosten;

        return $this;
    }

    public function getFinanzierung(): ?string
    {
        return $this->finanzierung;
    }

    public function setFinanzierung(string $finanzierung): self
    {
        $this->finanzierung = $finanzierung;

        return $this;
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

    /**
     * @return Collection|Planes[]
     */
    public function getPlanes(): Collection
    {
        return $this->planes;
    }

    public function addPlane(Planes $plane): self
    {
        if (!$this->planes->contains($plane)) {
            $this->planes[] = $plane;
            $plane->setVerfahren($this);
        }

        return $this;
    }

    public function removePlane(Planes $plane): self
    {
        if ($this->planes->removeElement($plane)) {
            // set the owning side to null (unless already changed)
            if ($plane->getVerfahren() === $this) {
                $plane->setVerfahren(null);
            }
        }

        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLng(): ?float
    {
        return $this->lng;
    }

    public function setLng(float $lng): self
    {
        $this->lng = $lng;

        return $this;
    }
}
