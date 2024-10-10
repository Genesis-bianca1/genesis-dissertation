<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>Monodiction</title> 
        <link rel="stylesheet" href="/19141230/css/styles.css">
        <img src="/19141230/img/logo.png" alt="logo" id="logo">
    </head>
    <body>
        <div class="navigation-container">
            <header>
                <nav>
                    <ul>
                        <?php
                        //Reveals different navigation options based on user login status
                        if (!isset($_SESSION["u_id"])) {
                            echo "<li><a href='register.php'><strong>Sign Up</strong></a></li>";
                            echo "<li><a href='login.php'><strong>Login</strong></a></li>";
                            echo "<li style='float:right'><a href='about_us.php'><strong>About Us</strong></a></li>";
                        } else {
                            echo "<li><a href='profile.php'><strong>" . $_SESSION["u_f_name_id"] . "</strong></a></li>";
                            echo "<li><a href='index.php'><strong>Practices</strong></a></li>";
                            echo "<li><a href='progress.php'><strong>Progress</strong></a></li>";
                            echo "<li><a href='social.php'><strong>Social</strong></a></li>";
                            echo "<li><a href='certificate.php'><strong>Accredation</strong></a></li>";
                            echo "<li style='float:right;'><a href='/19141230/includes/logout.inc.php'><strong>Log Out</strong></a></li>";
                            echo "<li style='float:right;'><a href='lock.php'><span style='font-size: 17px;padding:0%;'>&#x1F512</span></a></li>";
                        };
                        ?>
                    </ul>
                </nav>
            </header>
        </div>
        <main>