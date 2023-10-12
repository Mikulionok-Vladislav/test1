<?php

namespace entity;
include_once ('ProductInterface.php');
class Product implements ProductInterface
{
    protected $name;
    protected $article;
    protected $price;

//    public function __construct($name, $article, $price) {
//        $this->name = $name;
//        $this->article = $article;
//        $this->price = $price;
//    }

    public function discount($percentage):float {
        $discountAmount = $this->price * ($percentage / 100);
        $this->price -= $discountAmount;
        return $this->price;
    }

    public function order($quantity):float {
        return $this->price * $quantity;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getArticle() {
        return $this->article;
    }

    public function setArticle($article) {
        $this->article = $article;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }
}