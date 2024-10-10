<?php
//To display error messages in detail for faster fix
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Securely post the user details from registration form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'dbh.inc.php';
    require_once 'func.inc.php';

    $u_name = htmlspecialchars($_POST["user_name"], ENT_QUOTES, 'UTF-8');
    $f_name = htmlspecialchars($_POST["first_name"], ENT_QUOTES, 'UTF-8');
    $l_name = htmlspecialchars($_POST["last_name"], ENT_QUOTES, 'UTF-8');
    $e_mail = htmlspecialchars($_POST["e-mail"], ENT_QUOTES, 'UTF-8');
    $u_password = htmlspecialchars($_POST["user_password"], ENT_QUOTES, 'UTF-8');
    $rep_password = htmlspecialchars($_POST["repeat_password"], ENT_QUOTES, 'UTF-8');


    //Set the "if" conditions to detect for undesirable situations/outcomes
    //Functions below are elaborated on func.inc.php
    //Error handling set
    if (empty_reg_fields($u_name, $f_name, $l_name, $e_mail, $u_password, $rep_password) !== false) {
        header("Location: ../register.php?error=empty-reg-fields");
        exit();
    }
    if (invalid_username($u_name) !== false) {
        header("Location: ../register.php?error=invalid-u-name");
        exit();
    }
    if (existing_user_n_email($conn, $u_name, $e_mail) !== false) {
        header("Location: ../register.php?error=account-exists");
        exit();
    }
    if (invalid_email($e_mail) !== false) {
        header("Location: ../register.php?error=invalid-email");
        exit();
    }
    if (invalid_password($u_password) !==false) {
        header("Location: ../register.php?error=invalid-passw");
        exit();
    }
    if (unmatching_passwords($u_password, $rep_password) !==false) {
        header("Location: ../register.php?error=unmatching-passws");
        exit();
    } else {
        //Proceed with registration when mistakes have not been committed
        register_user($conn, $u_name, $f_name, $l_name, $e_mail, $u_password);
        header("Location: ../login.php?error=none");
        exit();
    }
    //If errors are detected, redirect to registration page
} else {
    header("Location: ../register.php?error=reg-fail");
    exit();
}