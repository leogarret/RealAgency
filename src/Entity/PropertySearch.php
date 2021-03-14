<?php
namespace App\Entity;

class PropertySearch {

    /**
     * @var int|null
     */
    private $maxPrice;

    /**
     * @var int|null
     */
    private $minSurface;

    /**
     * @return int|null
     */
    public function getMaxPrice(): ?int {
        return $this->maxPrice;
    }

    /**
     * @param int $maxPrice
     * @return PropertySearch
     */
    public function setMaxPrice($maxPrice): PropertySearch {
        $this->maxPrice = $maxPrice;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMinSurface(): ?int {
        return $this->minSurface;
    } 
    
    /**
     * @param int $minSurface
     * @return PropertySearch
     */
    public function setMinSurface($minSurface): PropertySearch {
        $this->minSurface = $minSurface;
        return $this;
    }
}