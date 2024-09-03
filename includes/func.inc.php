<?php

function empty_fields($u_name, $f_name, $l_name, $e_mail, $u_password, $rep_password) {
    $result;
    if (empty($u_name) || empty($f_name) || empty($l_name) || empty($e_mail) || empty($u_password) || empty($rep_password)) {
        $result = true;
    } else {
        $result = false;
    } return $result;
}

function invalid_username($u_name) {
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $u_name)) {
        $result = true;
    } else {
        $result = false;
    } return $result;
}

function existing_user_n_email($conn, $u_name, $e_mail) {
    //Prepared statement to check all usernames in DB
    $sql = "SELECT * FROM users WHERE username =? OR email=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../register.php?error=prep-statement-failure");
        exit();
    }

    //Bind parameters together to obtain data from DB
    mysqli_stmt_bind_param($stmt, "ss", $u_name, $e_mail);
    mysqli_stmt_execute($stmt);

    $db_result = mysqli_stmt_get_result($stmt);
    
    //If data in DB is found because it already exists, then guide user to log in
    if($row = mysqli_fetch_assoc($db_result)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function invalid_email($e_mail) {
    $result;
    if(!filter_var($e_mail, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    } return $result;
}

function invalid_password($u_password){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $u_password)) { //Specal chars needed
        $result = true;
    } else {
        $result = false;
    } return $result;
}

function unmatching_passwords($u_password, $rep_password) {
    $result;
    if($u_password !== $rep_password) {
        $result = true;
    } else {
        $result = false;
    } return $result;
}

function register_user($conn, $u_name, $f_name, $l_name, $e_mail, $u_password) {
    //Prepared statement to check all usernames in DB
    $sql = "INSERT INTO users (username, forename, surname, email, passcode) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    //Check if prep stmt fails
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../register.php?error=prep-statement-failure");
        exit();
    }
    //Hash password for user security
    $hash_password = password_hash($u_password, PASSWORD_DEFAULT);

    //Bind parameters together to obtain data from DB
    mysqli_stmt_bind_param($stmt, "sssss", $u_name, $f_name, $l_name, $e_mail, $hash_password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../register.php?error=none");
    exit();
}
