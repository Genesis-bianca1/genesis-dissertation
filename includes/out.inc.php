<?php
session_start(); 

session_unset();   //Clears session variables
session_destroy(); //Destroy session data

header("Location: /Genesis_Project/app/views/login.php"); //Redirect to login page