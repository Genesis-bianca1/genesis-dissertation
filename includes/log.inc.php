<?php

//Reveals error messages in detail for faster fix
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

session_start();

//On submit, post user's login input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'dbh.inc.php';
    require_once 'func.inc.php';

    //Secure transfer of login inputs
    $u_name = htmlspecialchars($_POST["user_name"], ENT_QUOTES, 'UTF-8');
    $u_password = htmlspecialchars($_POST["user_password"], ENT_QUOTES, 'UTF-8');

    //Set the "if" conditions to determine the undesirable situations/outcomes
    //Functions below are elaborated on func.inc.php
    //Error handlers set
    if (empty_log_fields($u_name, $u_password) !== false) {
        header("Location: ../login.php?error=empty-log-fields");
        exit();
    }
    if (invalid_username($u_name) !== false) {
        header("Location: ../login.php?error=invalid-u-name");
        exit();
    }
    if (!existing_user($conn, $u_name) !== false) {
        header("Location: ../login.php?error=u-not-found");
        exit();
    }
    if (invalid_password($u_password) !==false) {
        header("Location: ../login.php?error=invalid-passw");
        exit();
    }
    if (incorrect_password($conn, $u_name, $u_password) !==false) {
        header("Location: ../login.php?error=incorrect-login");
        exit();
    } else {
        //If no issues, Log in
        login_user($conn, $u_name, $u_password);
    }
} else {
    //Redirect to login page when form submission fails
    header("Location: ../login.php?error=form-submission-fail");
    exit();
}