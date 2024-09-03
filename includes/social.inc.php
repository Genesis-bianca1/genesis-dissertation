<?php

//Check if the post is submitted
if(isset($_POST['submit'])) {
    $user_name = $_SESSION['user_name'];
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    include_once 'dbh.inc.php';
    include_once 'func.inc.php';

    if(!empty($content)) {
        //The following line may cause issues because $u_name is associated to username (DB) & it is not the primary key, user_id (DB) is.
        //This line may assume that user_id (DB) === to user_name/$u_name (WEB)
        //If posts are not associated, check this line and fix error
        //DO NOT DELETE THE TABLES, that SHOULD NOT BE NECESSARY
        $sql = "INSERT INTO posts (user_id, content) VALUES ('$u_name', '$content')";
        mysqli_query($conn, $sql);
        //Write a separate <?php if(()){} ... echo <p>Sucess! Your post was sent</p>
        header("Location: social.php");
        exit();
    }
}

$sql = "SELECT * FROM posts ORDER BY timestamp DESC";
$result = mysqli_query($conn, $sql);
?>