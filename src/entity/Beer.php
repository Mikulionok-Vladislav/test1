<?php

namespace entity;
include_once ('Product.php');
class Beer extends Product
{
    private $alcoholPercentage;

//    public function __construct($name, $article, $price, $alcoholPercentage) {
//        parent::__construct($name, $article, $price);
//        $this->alcoholPercentage = $alcoholPercentage;
//    }

    public function getAlcoholPercentage() {
        return $this->alcoholPercentage;
    }

    public function setAlcoholPercentage($alcoholPercentage) {
        $this->alcoholPercentage = $alcoholPercentage;
    }
}