<?php
namespace App\Entity;

class PropertySearch {

    /**
     * @var int|not null
     */

    private $maxPrice;
    private $minPrice;

    /**
     * @var int|not null
     */

    private $maxKillometre;
    private $minKillometre;

    /**
     * @var int|not null
     */

    private $maxAge;
    private $minAge;

    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    public function getMinPrice(): ?int
    {
        return $this->minPrice;
    }

    public function getMaxKillometre(): ?int
    {
        return $this->maxKillometre;
    }

    public function getMinKillometre(): ?int
    {
        return $this->minKillometre;
    }

    public function getMaxAge(): ?int
    {
        return $this->maxAge;
    }

    public function getMinAge(): ?int
    {
        return $this->minAge;
    }


    public function setMaxPrice(?int $maxPrice): static
    {
        $this->maxPrice = $maxPrice;

        return $this;
    }

    public function setMinPrice(?int $minPrice): static
    {
        $this->minPrice = $minPrice;

        return $this;
    }

    public function setMaxKillometre(?int $maxKillometre): static
    {
        $this->maxKillometre = $maxKillometre;

        return $this;
    }

    public function setMinKillometre(?int $minKillometre): static
    {
        $this->minKillometre = $minKillometre;

        return $this;
    }

    public function setMaxAge(?int $maxAge): static
    {
        $this->maxAge = $maxAge;

        return $this;
    }

    public function setMinAge(?int $minAge): static
    {
        $this->minAge = $minAge;

        return $this;
    }
}