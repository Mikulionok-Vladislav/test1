<?php
require 'DBConnection.php';

function createTable($sql, $conn)
{

    try {
        $conn->exec($sql);
        print("\nCreated Table.\n");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

$office_table = "CREATE TABLE IF NOT EXISTS office (
id serial PRIMARY KEY,
name character varying(30) NOT NULL,
address character varying(30) NOT NULL,
type character varying(30),
numberofstaff character varying(30),
phone_number character varying(30),
email character varying(30),
created_at timestamp,
updated_at timestamp
)";
createTable($office_table, $conn);

$cabinet_table = "CREATE TABLE IF NOT EXISTS cabinet (
id serial PRIMARY KEY,
name character varying(30) NOT NULL,
office_id int NOT NULL,
created_at timestamp,
updated_at timestamp,
FOREIGN KEY (office_id) REFERENCES office (id) ON DELETE CASCADE
)";
createTable($cabinet_table, $conn);

$product_table = "CREATE TABLE IF NOT EXISTS product (
id serial PRIMARY KEY,
name character varying(50) NOT NULL,
price int NOT NULL,
created_at timestamp,
updated_at timestamp
)";
createTable($product_table, $conn);

$employee_table = "CREATE TABLE IF NOT EXISTS employee (
id serial PRIMARY KEY,
firstname character varying(50) NOT NULL,
lastname character varying(50) NOT NULL,
middlename character varying(50) NOT NULL,
created_at timestamp,
updated_at timestamp
)";
createTable($employee_table, $conn);

$phone_table = "CREATE TABLE IF NOT EXISTS phone (
id serial PRIMARY KEY,
employee_id int NOT NULL,
phone character varying(50) NOT NULL,
created_at timestamp,
updated_at timestamp,
FOREIGN KEY (employee_id) REFERENCES employee (id) ON DELETE CASCADE
)";
createTable($phone_table, $conn);

$email_table = "CREATE TABLE IF NOT EXISTS email (
id serial PRIMARY KEY,
employee_id int NOT NULL,
email character varying(50) NOT NULL,
created_at timestamp,
updated_at timestamp,
FOREIGN KEY (employee_id) REFERENCES employee (id) ON DELETE CASCADE
)";
createTable($email_table, $conn);


$empl_prod_cab_table = "CREATE TABLE IF NOT EXISTS employee_product_cabinet (
id serial PRIMARY KEY,
cabinet_id int NOT NULL,
product_id int NOT NULL,
employee_id int NOT NULL,
discription character varying(300),
operation_time int NOT NULL,
created_at timestamp,
updated_at timestamp,
FOREIGN KEY (cabinet_id) REFERENCES cabinet (id) ON DELETE CASCADE,
FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE,
FOREIGN KEY (employee_id) REFERENCES employee (id) ON DELETE CASCADE
)";
createTable($empl_prod_cab_table, $conn);

