<?php

namespace offices;

include_once ('Office.php');

class BusinessOffice extends Office
{
    private $phoneNumber;
    private $email;

    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function fullName() {
        return $this->getName() . " at " . $this->getAddress();
    }
}