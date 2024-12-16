<?php
//Database connection parameters

//Website Deployment Host InfinityFree
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "platform";

//Attempting to establish a connection with MySQL server
$conn = mysqli_connect($servername, $username, $password, $db_name);

//Checking if connection is successful
if (!$conn) {
    //provides generic details about connection failed without compromising DB's security & stops script
    die("Failed to connect: " . mysqli_connect_error());
}

/* DB credentials for connecting to local and remote hosts

//Website Deployment Host InfinityFree
$servername = "sql111.infinityfree.com";
$username = "if0_37361428";
$password = "iGkc4PNmwliH7";
$db_name = "if0_37361428_platform";

//XAMPP Local Host for Testing Purposes
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "platform";

*/

?>