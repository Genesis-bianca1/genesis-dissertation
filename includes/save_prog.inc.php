<?php
require 'dbh.inc.php';
require 'func.inc.php';

session_start();
if (isset($_SESSION['u_name_id'])) {
    $u_name_id = $_SESSION['u_name_id'];

    $sql = "REPLACE INTO challenge_progress FROM users WHERE user_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $u_name_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $u_data = mysqli_fetch_assoc($result);
        $progress = $u_data['challenge_progress'];
    }
} else {
    $progress = 'none';
}



$u_name = $_SESSION['u_name_id'];
$score = $_GET['score'];
$chall_id = $_GET['challenge_id'];

$sql = "REPLACE INTO user_progress (user_id, challenge_id, score) VALUES (?, ?, ?)";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../error.php?error=sql-stmt-error");
    exit();
}

mysqli_stmt_bind_param($stmt, "")