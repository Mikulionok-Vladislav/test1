<?php
require 'DBConnection.php';
function addDataInDB($conn)
{
    try {
        $conn->query("INSERT INTO office (name, address, created_at) VALUES('Deweloper office','labanka 17',now())");
        $conn->query("INSERT INTO office (name, address, created_at) VALUES('Build office','skripnikova 5',now())");

        $conn->query("INSERT INTO cabinet (name, office_id, created_at) VALUES('317',1,now())");
        $conn->query("INSERT INTO cabinet (name, office_id, created_at) VALUES('222',2,now())");
        $conn->query("INSERT INTO cabinet (name, office_id, created_at) VALUES('101',2,now())");

        $conn->query("INSERT INTO employee (firstname, lastname, middlename, created_at) VALUES('Vlad','Mikulenok','Aleksandrovich',now())");
        $conn->query("INSERT INTO employee (firstname, lastname, middlename, created_at) VALUES('Nikita','Kameysha','Sergeevich',now())");

        $conn->query("INSERT INTO email (employee_id, email, created_at) VALUES(1,'mikulenokvlad@example.com',now())");
        $conn->query("INSERT INTO email (employee_id, email, created_at) VALUES(2,'ekameysha@example.com',now())");

        $conn->query("INSERT INTO phone (employee_id, phone, created_at) VALUES(1,'80292148765',now())");
        $conn->query("INSERT INTO phone (employee_id, phone, created_at) VALUES(2,'80257134592',now())");

        $conn->query("INSERT INTO product (name, price, created_at) VALUES('Komputer',4000,now())");
        $conn->query("INSERT INTO product (name, price, created_at) VALUES('Holodilnic',2000,now())");

        $conn->query("INSERT INTO employee_product_cabinet (cabinet_id, product_id, employee_id, discription, operation_time, created_at) VALUES(1,1,1,'Sdelal delo guliai smelo',20,now())");
        $conn->query("INSERT INTO employee_product_cabinet (cabinet_id, product_id, employee_id, discription, operation_time, created_at) VALUES(2,2,2,'Kushat` podano',5,now())");
        echo "\ninsertdata\n";
    } catch (PDOException $e) {
        echo "<p class='err p2'>sql is nok: " . $e->getMessage() . "</p>";
    }
}

function updateDataInDB($conn)
{
    try {

        $conn->query("UPDATE office SET name = 'Holodos office', updated_at = now() WHERE id = 2 ");
        echo "\nupdatedata\n";
    } catch (PDOException $e) {
        echo "<p class='err p2'>sql is nok: " . $e->getMessage() . "</p>";
    }
}

function deleteDataInDB($conn)
{
    try {

        $conn->query("DELETE FROM cabinet WHERE id=3");
        echo "\ndeletedata\n";
    } catch (PDOException $e) {
        echo "<p class='err p2'>sql is nok: " . $e->getMessage() . "</p>";
    }
}

addDataInDB($conn);
updateDataInDB($conn);
deleteDataInDB($conn);
