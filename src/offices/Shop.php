<?php

namespace offices;
include_once ('Office.php');


class Shop extends Office
{
    private $numberOfStaff;
    public function getNumberOfStaff() {
        return $this->numberOfStaff;
    }

    public function setNumberOfStaff($numberOfStaff) {
        $this->numberOfStaff = $numberOfStaff;
    }

    public function fullName() {
        return $this->getName() . " - " . $this->getAddress();
    }
}