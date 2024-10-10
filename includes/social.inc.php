<?php

//This code is under development
//To resume when failed sprint 5 tasks succeed

if(isset($_POST["submit"])) {
    $u_id = $_SESSION["u_id"];
    $content = mysqli_real_escape_string($conn, $_POST["content"]);

    include_once "dbh.inc.php";
    include_once "func.inc.php";

    if(!empty($content)) {
        $sql = "INSERT INTO posts (user_id, content) VALUES (?, ?)";
        mysqli_query($conn, $sql);
        // Write a separate header: if(()){} ... echo <p>Sucess! Your post was sent</p>
        header("Location: social.php");
        exit();
    }
}

?>