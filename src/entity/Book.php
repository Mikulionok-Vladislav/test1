<?php

namespace entity;
include_once ('Product.php');
class Book extends Product
{
    private $pages;
    private $author;

//    public function __construct($name, $article, $price, $pages, $author) {
//        parent::__construct($name, $article, $price);
//        $this->pages = $pages;
//        $this->author = $author;
//    }

    public function getPages() {
        return $this->pages;
    }

    public function setPages($pages) {
        $this->pages = $pages;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }
}