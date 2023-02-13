<?php
include './config/nomeDasTabelas.php';

$servername = "localhost";
$username = "root";
$password = "";
$database="pachados";

try {
    $db = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}