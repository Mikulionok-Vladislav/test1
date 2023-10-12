<?php

namespace offices;

require_once('Shop.php');
require_once('BusinessOffice.php');

$shop = new Shop();
$shop->setName("NewShop");
$shop->setAddress("456 Elm St.");
$shop->setNumberOfStaff(15);

echo "Shop Name: " . $shop->getName() . "\n" . "<br>";
echo "Shop Address: " . $shop->getAddress() . "\n" . "<br>";
echo "Number of Staff: " . $shop->getNumberOfStaff() . "\n" . "<br>". "<br>";

$business = new BusinessOffice();
$business->setName("NewBusiness");
$business->setAddress("101 Pine St.");
$business->setPhoneNumber("555-987-6543");
$business->setEmail("info@example.com");

echo "Business Name: " . $business->getName() . "\n". "<br>";
echo "Business Address: " . $business->getAddress() . "\n". "<br>";
echo "Phone Number: " . $business->getPhoneNumber() . "\n". "<br>";
echo "Email: " . $business->getEmail() . "\n". "<br>";
echo "Full Name: " . $business->FullName() . "\n". "<br>". "<br>";


