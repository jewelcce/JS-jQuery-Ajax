<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/10/2017
 * Time: 12:41 PM
 */

print_r($_POST);


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

$countryName=$_POST['country_name'];
$cityName=$_POST['city_name'];


$sql = "INSERT INTO `countries` (`name`, `city`) VALUES ('$countryName','$cityName');";
$result = $conn->query($sql);
echo "Data Successfully Inserted";



$conn->close();

?>