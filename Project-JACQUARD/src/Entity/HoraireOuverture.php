<?php

namespace App\Entity;

use App\Repository\HoraireOuvertureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HoraireOuvertureRepository::class)]
class HoraireOuverture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lundi = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mardi = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mercredi = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $jeudi = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vendredi = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $samedi = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $dimanche = null;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'relation')]
    private Collection $test;

    public function __construct()
    {
        $this->test = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLundi(): ?string
    {
        return $this->lundi;
    }

    public function setLundi(?string $lundi): static
    {
        $this->lundi = $lundi;

        return $this;
    }

    public function getMardi(): ?string
    {
        return $this->mardi;
    }

    public function setMardi(?string $mardi): static
    {
        $this->mardi = $mardi;

        return $this;
    }

    public function getMercredi(): ?string
    {
        return $this->mercredi;
    }

    public function setMercredi(?string $mercredi): static
    {
        $this->mercredi = $mercredi;

        return $this;
    }

    public function getJeudi(): ?string
    {
        return $this->jeudi;
    }

    public function setJeudi(?string $jeudi): static
    {
        $this->jeudi = $jeudi;

        return $this;
    }

    public function getVendredi(): ?string
    {
        return $this->vendredi;
    }

    public function setVendredi(?string $vendredi): static
    {
        $this->vendredi = $vendredi;

        return $this;
    }

    public function getSamedi(): ?string
    {
        return $this->samedi;
    }

    public function setSamedi(?string $samedi): static
    {
        $this->samedi = $samedi;

        return $this;
    }

    public function getDimanche(): ?string
    {
        return $this->dimanche;
    }

    public function setDimanche(?string $dimanche): static
    {
        $this->dimanche = $dimanche;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getTest(): Collection
    {
        return $this->test;
    }

    public function addTest(User $test): static
    {
        if (!$this->test->contains($test)) {
            $this->test->add($test);
            $test->addRelation($this);
        }

        return $this;
    }

    public function removeTest(User $test): static
    {
        if ($this->test->removeElement($test)) {
            $test->removeRelation($this);
        }

        return $this;
    }
}
