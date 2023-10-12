<?php
$dbname = 'postgres';
$username = 'root';
$password = 'root';
$host = 'postgres';
$port = 5432;
$options = [];


$dsn = "pgsql:host={$host};port={$port};dbname={$dbname}";
$conn = new PDO($dsn, $username, $password, $options);
if ($conn) {
    echo "Connected to the database successfully!";
} else {
    echo "ERROR";
}