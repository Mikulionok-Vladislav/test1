<?php

namespace AddToBD;

class AddToBD
{

    public function addShop($shop, $conn)
    {
        $name = $shop->getName();
        $address = $shop->getAddress();
        $staff = $shop->getNumberOfStaff();
        $sql = "INSERT INTO office (name,address,type,numberofstaff) VALUES('$name','$address','Shop','$staff')";


        try {
            $conn->query($sql);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function addBusiness($business, $conn)
    {
        $name = $business->getName();
        $address = $business->getAddress();
        $number = $business->getPhoneNumber();
        $email = $business->getEmail();
        $sql = "INSERT INTO office (name, address, type, phone_number, email) VALUES (:name, :address,'BusinessOffice' , :phone_number, :email)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':address', $address);
        $stmt->bindValue(':phone_number', $number);
        $stmt->bindValue(':email', $email);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}