<?php
require 'dbh.inc.php';

//Derive user's average score from DB records
function next_challenge($conn, $u_id) {
    $sql = "SELECT AVG(score) AS average_score FROM user_progress WHERE user_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,  $sql)) {
        header("Location: ../challenge_1.php?error=sql-stmt-fail");
        exit();
    }
    //Bind user to the sql query, execute, get $result
    mysqli_stmt_bind_param($stmt, "i", $u_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $avg_score = $row['average_score'];

    //Returns diff challenge(difficulty) based on users average score
    if($avg_score < 50) {
        return "easy";
    } elseif ($avg_score >= 50 && $avg_score < 75) {
        return "medium";
    } else {
        return "difficult";
    }
}

//Stores user_id in a session
session_start();
$u_name = $_SESSION['user_name'];

//Gets next challenge based on score
$next_chall = next_challenge($conn, $u_id);

//Returns easy, medium or difficult
echo $next_chall;
