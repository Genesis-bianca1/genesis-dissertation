<?php

//Destroy the session & redirect to login page
session_start();
session_unset();
session_destroy();

header("Location: ../login.php");
exit();

?>