<?php
//error_reporting(E_ERROR | E_PARSE);
header('Access-Control-Allow-Origin: *'); // para permitir que o pedido seja efetuado de qualquer lado
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With"); 
//header('Content-Type: application/json; charset=utf-8');


$servername = "localhost";
$username = "root";
$password = "";
$database="pachados";

// Create connection
$db = new mysqli($servername, $username, $password, $database);

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}



try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}