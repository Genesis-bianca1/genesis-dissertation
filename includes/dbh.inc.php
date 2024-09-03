<?php
//Database connection parameters
$servername = "localhost";
$username = "root"; // default username for XAMPP
$password = ""; // Default password for XAMPP/MAria DB
$db_name = "platform";

//Attempting to establish a connection with MySQL server
$conn = mysqli_connect($servername, $username, $password, $db_name);

//Checking if connection is successful
if (!$conn) {
    //provides generic details about connection failed without compromising DB's security & stops script
    die("Failed to connect: " . mysqli_connect_error());
}
?>