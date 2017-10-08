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

$name = $_POST['name'];
$city = $_POST['city'];

$sql = "INSERT into countries(name,city) values('$name','$city')";
$result = $conn->query($sql);
echo "success";

$conn->close();
?>