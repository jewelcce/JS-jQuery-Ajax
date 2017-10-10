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

$sql = "SELECT * FROM countries";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        $countries[]= $row;
        // store data of each row


    }
} else {
    echo "0 results";
}

echo json_encode($countries);
//Array to JSON conversion


$conn->close();

?>