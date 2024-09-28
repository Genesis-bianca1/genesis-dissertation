<?php
//Database connection parameters
$servername = "localhost"; //XAMPP Local Host for testing purposes
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

/* Credentials for connecting to InfinityFree (remote host)

$servername = "sql111.infinityfree.com"; //Website Host InfinityFree
$username = "if0_37361428";
$password = "iGkc4PNmwliH7";
$db_name = "if0_37361428_platform";

*/

?>