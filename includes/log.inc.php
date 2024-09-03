<?php

if (isset($_POST["submit"])) {

    $u_name = $_POST["user_name"];
    $u_password = $_POST["user_password"];

    include 'dbh.inc.php';

}

//Obtain user's login credentials from the POST request
$user_name = $_POST['user_name'];
$user_password = $_POST['user_password'];

//Secure the input
$user_name = mysqli_real_escape_string($conn, $user_name);


$query = "SELECT * FROM users WHERE username='$user_name' AND passcode='$user_password'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 1) {
    $_SESSION['username'] = $user_name;
    header("Location: /Genesis_Project/_public/index.php");
} else {
    echo "Invalid username or password";
}