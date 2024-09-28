<?php

//Reveals error messages in detail for faster fix
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

//On submit, fetch user's login input - removing any spaces
if (isset($_POST["submit"])) {
    require_once 'dbh.inc.php';
    require_once 'func.inc.php';

    $u_name = trim($_POST["user_name"]);
    $u_password = trim($_POST["user_password"]);

    //Set the "if" conditions to determine the undesirable situations/outcomes
    //Functions below are elaborated on func.inc.php
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
    //Redirect when form submission fails
    header("Location: ../login.php?error=form-submission-fail");
    exit();
}