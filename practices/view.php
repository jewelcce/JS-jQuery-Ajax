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
$id=$_GET['id'];

$sql = "SELECT * FROM countries WHERE id=$id";
$result = $conn->query($sql);
$countries = $result->fetch_assoc();

echo json_encode($countries);

$conn->close();

?>