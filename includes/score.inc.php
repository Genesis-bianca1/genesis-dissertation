<?php

//This code is under development
//To resume when failed sprint 5 tasks succeed

session_start();
include "dbh.inc.php";
include "func.inc.php";

$sql = "REPLACE INTO current_level FROM users WHERE user_id = ?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", );
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $u_data = mysqli_fetch_assoc($result);
    $progress = $u_data["current_level"];
} else {
    $progress = "easy";
}

//Replaces user streak
$sql = "REPLACE INTO streak FROM users_lock_settings WHERE user_id = ?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $u_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $u_data = mysqli_fetch_assoc($result);
    $progress = $u_data["streak"];
} else {
    $progress = "0";
}





//Gets the course code from the POST request
$student_id = $_SESSION['student_id'];
$marks = [
    'COMP7001' => $_POST['comp7001'],
    'COMP7002' => $_POST['comp7002'],
    'TECH7005' => $_POST['tech7005'],
    'DALT7002' => $_POST['dalt7002'],
    'DALT7011' => $_POST['dalt7011'],
    'SOFT7003' => $_POST['soft7003'],
    'TECH7004' => $_POST['tech7004'],
    'TECH7009' => $_POST['tech7009'],
];

//Loop through each mark and stores it in database with its corresponding grade
foreach ($marks as $module_code => $mark) {
    $grade = '';
    if ($mark >= 70) {
        $grade  = 'A';
    } elseif ($mark >= 60) {
        $grade = 'B';
    } elseif ($mark >=50) {
        $grade = 'C';
    } else {
        $grade = 'F';
    }
    // Prepared SQL query to insert/update marks and grades in database's Marks table
    $query = "INSERT INTO Marks (student_id, module_code, mark, grade) VALUES ('$student_id', '$module_code', '$mark', '$grade')";
    mysqli_query($conn, $query);
}

//Calculate average mark
$total_marks = array_sum($marks);
$average_mark = $total_marks / count($marks);

//Loops through to acount modules passed & defines what constitutes as credits earned
$credits = 0;
foreach ($marks as $module_code => $mark) {
    if ($mark >=50)  {
        $credits += $module_credits[$module_code];
    }
}

//Determine MSc classification
$award = '';
$class = '';
if ($credits = 180) {
    $award = 'MSc in Computing Science';
    if ($average_mark >= 70 && $marks['TECH7009'] >= 68) {
        $class = 'DISTINCTION';
    } elseif ($average_mark >= 60 && $marks['TECH7009'] >= 58) {
        $class = 'MERIT';
    } elseif ($average_mark >= 50 && $marks['TECH7009'] >= 50) {
        $class = 'PASS';
    }
//Determine PG classification
} elseif ($credits >=120) {
    $award = 'PG Diploma in Computing';
} else {
    $class = 'FAIL';
}

//Save classification in database
$query = "REPLACE INTO Classification (student_id, award, class) VALUES ('$student_id', '$award', '$class')";
mysqli_query($conn, $query);

//Redirect to the results page
header("Location: marks_results.php");
?>