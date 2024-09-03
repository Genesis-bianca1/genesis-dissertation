<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Fetch the user details from registration form
if (isset($_POST["submit"])) {
    $u_name = $_POST["user_name"];
    $f_name = $_POST["first_name"];
    $l_name = $_POST["last_name"];
    $e_mail = $_POST["e-mail"];
    $u_password = $_POST["user_password"];
    $rep_password = $_POST["repeat_password"];

    require_once 'dbh.inc.php';
    require_once 'func.inc.php';


    //Set the "if" conditions to lay out the undesirable situations/outcomes
    //Functions below are elaborated on func.inc.php
    if (empty_fields($u_name, $f_name, $l_name, $e_mail, $u_password, $rep_password) !== false) {
        header("Location: ../register.php?error=empty-fields");
        exit();
    }
    if (invalid_username($u_name) !== false) {
        header("Location: ../register.php?error=invalid-username");
        exit();
    }
    if (existing_user_n_email($conn, $u_name, $e_mail) !== false) {
        header("Location: ../register.php?error=existing-username-user-n-email");
        exit();
    }
    if (invalid_email($e_mail) !== false) {
        header("Location: ../register.php?error=invalid-email");
        exit();
    }
    if (invalid_password($u_password) !==false) {
        header("Location: ../register.php?error=invalid-password");
        exit();
    }
    if (unmatching_passwords($u_password, $rep_password) !==false) {
        header("Location: ../register.php?error=unmatching-passwords");
        exit();
    } else {
        //Proceed with registration when mistakes have not been committed on registration process
        register_user($conn, $u_name, $f_name, $l_name, $e_mail, $u_password);
        header("Location: ../login.php");
        exit();
    }
    
} else {
    header("Location: ../register.php?error=unsuccessful_register");
    exit();
}