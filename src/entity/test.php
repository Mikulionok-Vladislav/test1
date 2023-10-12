<?php

namespace entity;
require_once('Food.php');
$food1 = new Food();
$food1->setName("Apple");
$food1->setArticle("F123");
$food1->setPrice(10);
$food1->setShelfLife("2023-09-30");
$food1->setWeight(0.2);

echo "Food Name: " . $food1->getName() . "\n". "<br>";
echo "Food Article: " . $food1->getArticle() . "\n". "<br>";
echo "Price: " . $food1->getPrice() . "\n". "<br>";
echo "Shelf Life: " . $food1->getShelfLife() . "\n". "<br>";
echo "Food Weight: " . $food1->getWeight() . "\n". "<br>";
echo "Food discount: " . $food1->discount(50) . "\n". "<br>";
echo "Food Order Price: " . $food1->order(4) . "\n". "<br>". "<br>";

