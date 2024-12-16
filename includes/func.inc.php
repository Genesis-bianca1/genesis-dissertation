<?php

//Loin & Register functions are to determine if undesirable cases have occurred
//If undesirable cases = TRUE, then user cannot register or login

// 1 - REGISTER FORM

//Checks for empty field on register form
function empty_reg_fields($u_id, $f_name, $l_name, $e_mail, $u_password, $rep_password) {
    $result;
    if (empty($u_id) || empty($f_name) || empty($l_name) || empty($e_mail) || empty($u_password) || empty($rep_password)) {
        $result = true;
    } else {
        $result = false;
    } return $result;
}

//Checks for permissible characters in username field for register & login forms
function invalid_username($u_id) {
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $u_id)) { //Special chars needed
        $result = true;
    } else {
        $result = false;
    } return $result;
}

//Checks if user already exists in database (Registration Form)
function existing_user_n_email($conn, $u_id, $e_mail) {

    //Prepared statement to check all user ids in DB
    $sql = "SELECT * FROM users WHERE user_id =? OR email=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../register.php?error=prep-stmt-fail");
        exit();
    }

    //Bind parameters together to obtain data from DB
    mysqli_stmt_bind_param($stmt, "ss", $u_id, $e_mail);
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

//Email validation verification
function invalid_email($e_mail) {
    $result;
    if(!filter_var($e_mail, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    } return $result;
}

//Determines if password uses appropriate characters
function invalid_password($u_password){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $u_password)) { //Special chars needed
        $result = true;
    } else {
        $result = false;
    } return $result;
}

//Checks if passwords match
function unmatching_passwords($u_password, $rep_password) {
    $result;
    if($u_password !== $rep_password) {
        $result = true;
    } else {
        $result = false;
    } return $result;
}

//If no errors, transfer input data to the DB and associate it with the newly registered user id
function register_user($conn, $u_id, $f_name, $l_name, $e_mail, $u_password) {
    //Prepared statement to check all user_ids in DB
    $sql = "INSERT INTO users (user_id, forename, surname, email, passcode) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    //Check if prep stmt fails
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../register.php?error=prep-stmt-fail");
        exit();
    }
    //Hash password for user security
    $hash_password = password_hash($u_password, PASSWORD_DEFAULT);

    //Bind parameters together to obtain data from DB
    mysqli_stmt_bind_param($stmt, "sssss", $u_id, $f_name, $l_name, $e_mail, $hash_password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../register.php?error=none");
    exit();
}

// 2 - LOGIN FORM

//Checks if login fields are empty
function empty_log_fields($u_id, $u_password) {
    $result;
    if (empty($u_id) || empty($u_password)) {
        $result = true;
    } else {
        $result = false;
    } return $result;
}

//Checks if user exists in DB
function existing_user($conn, $u_id) { 
    //Prepared statement to check all user_ids in DB
    $sql = "SELECT * FROM users WHERE user_id =?";
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login.php?error=prep-stmt-fail");
        exit();
    }
    //Bind parameters together to obtain data from DB
    mysqli_stmt_bind_param($stmt, "s", $u_id);
    mysqli_stmt_execute($stmt);

    $db_result = mysqli_stmt_get_result($stmt);
    
    //If data in DB is found because it already exists, then guide user to log in (in log.inc.php)
    if($row = mysqli_fetch_assoc($db_result)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

//Checks if password is wrong
function incorrect_password($conn, $u_id, $u_password) {
    $result;
    $existing_u = existing_user($conn, $u_id);
    //If user exists in DB, verify their password
    if ($existing_u !== false) {
        if (password_verify($u_password, $existing_u["passcode"])) {
            $result = false; //Password matches
        } else {
            $result = true; //Incorrect password
        } return $result;
    }
}

//If no errors, confirm user exists, start a session and log user in
function login_user($conn, $u_id, $u_password) {
    $existing_u = existing_user($conn, $u_id);
    //If user not found, redirect to login & show error
    if ($existing_u === false ) {
        header("Location: ../login.php?error=u-not-found");
        exit();
    }
    ////Securely retrive users password from DB to verify
    $hash_password = $existing_u["passcode"];
    $password_verify = password_verify($u_password, $hash_password);

    if($password_verify === false) {
        //General error msg to not reveal sensitive error info that compromises user privacy
        header("Location: ../login.php?error=incorrect-login");
        exit();
    //If passwords match start sessions & fetch necessary DB data
    } else if ($password_verify === true) {
        $sql = "SELECT
        u.user_id,
        u.forename,
        u.surname,
        u.email,
        u.current_level,
        uls.streak,
        uls.last_session,
        uls.start_lock_date,
        uls.start_lock_t,
        uls.end_lock_date,
        uls.end_lock_t,
        ue.exercise_name,
        ue.score,
        ue.t_completed,
        p.content AS post_content,
        p.t_posted AS post_timestamp
        FROM
        users u
        LEFT JOIN
        users_lock_settings uls ON u.user_id = uls.user_id
        LEFT JOIN
        users_exercises ue ON u.user_id = ue.user_id
        LEFT JOIN
        posts p ON u.user_id = p.user_id
        WHERE
        u.user_id = ?";

        if($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $u_id);
            $stmt->execute();
            $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            //Session variables from fetched data
            $_SESSION["u_id"] = $row["user_id"];
            $_SESSION["u_f_name_id"] = $row["forename"];
            $_SESSION["u_l_name_id"] = $row["surname"];
            $_SESSION["email_id"] = $row["email"];
            $_SESSION["level"] = $row["current_level"];
            $_SESSION["u_streak"] = $row["streak"];
            $_SESSION["last_login"] = $row["last_session"];
            $_SESSION["s_lock_d"] = $row["start_lock_date"];
            $_SESSION["s_lock_t"] = $row["start_lock_t"];
            $_SESSION["e_lock_d"] = $row["end_lock_date"];
            $_SESSION["e_lock_t"] = $row["end_lock_t"];
            $_SESSION["exercise"] = $row["exercise_name"];
            $_SESSION["points"] = $row["score"];
            $_SESSION["completed_t"] = $row["t_completed"];
            $_SESSION["posted_t"] = $row["post_timestamp"];
            $_SESSION["p_content"] = $row["post_content"];
            header("Location: ../profile.php?error=none");
            exit();
        } else {
            header("Location: ../login.php?error=no-data");
            exit();
        }
        $stmt->close(); 
    } else {
        header("Location: ../login.php?error=query-failed");
        exit();
    }
}
}













/*
//If no errors, confirm user exists, start a session and log user in
function login_user($conn, $u_id, $u_password) {
    $existing_u = existing_user($conn, $u_id);
    //If user not found, redirect to login & show error
    if ($existing_u === false ) {
        header("Location: ../login.php?error=u-not-found");
        exit();
    }
    ////Securely retrive users password from DB to verify
    $hash_password = $existing_u["passcode"];
    $password_verify = password_verify($u_password, $hash_password);

    if($password_verify === false) {
        //General error msg to not reveal sensitive error info that compromises user privacy
        header("Location: ../login.php?error=incorrect-login");
        exit();
    //If passwords match start sessions & fetch necessary DB data
    } else if ($password_verify === true) {
        session_start();
        $_SESSION["u_id"] = $existing_u["user_id"];
        $_SESSION["u_f_name_id"] = $existing_u["forename"];
        $_SESSION["u_l_name_id"] = $existing_u["surname"];
        $_SESSION["email_id"] = $existing_u["email"];
        $_SESSION["level"] = $existing_u["current_level"];
        $_SESSION["u_streak"] = $existing_u["streak"];
        $_SESSION["u_lock_d"] = $existing_u["start_lock_date"];
        $_SESSION["l_record"] = $existing_u["lock_record"];
        header("Location: ../profile.php?error=none");
        exit();
    }
}

*/