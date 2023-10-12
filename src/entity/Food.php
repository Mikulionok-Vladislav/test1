<?php

namespace entity;
include_once ('Product.php');
class Food extends Product
{
    private $shelfLife;
    private $weight;

//    public function     __construct($name, $article, $price, $shelfLife, $weight) {
//        parent::__construct($name, $article, $price);
//        $this->shelfLife = $shelfLife;
//        $this->weight = $weight;
//    }

    public function getShelfLife() {
        return $this->shelfLife;
    }

    public function setShelfLife($shelfLife) {
        $this->shelfLife = $shelfLife;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }
}
