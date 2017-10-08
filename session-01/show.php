<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "countries";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id = $_GET['id'];

$sql = "SELECT * FROM countries where id=$id";
$result = $conn->query($sql);


$countries = $result->fetch_assoc();

$conn->close();
?>

<h1>Country : <?= $countries['name']?></h1>
<h2>Country : <?= $countries['city']?></h2>