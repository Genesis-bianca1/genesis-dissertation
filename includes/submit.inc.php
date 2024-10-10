<?php
include_once "dbh.inc.php";
session_start();

//Logic for submitting exercise score results to DB
$u_id = $_SESSION["u_id"];
$exercise_name = $_POST["exercise_name"];
$score = $_POST["score"];

//Connect and send to users_exercises DB table
$sql = "INSERT INTO users_exercises (user_id, exercise_name, score) VALUES (?, ?, ?)";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)) {
    echo "Could not transfer details";
    exit();
}

mysqli_stmt_bind_param($stmt, "isd", $u_id, $exercise_name, $score);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
//Success
echo "Your progress has been recorded!";
?>