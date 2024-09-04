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
                        //Reveal different menu options based on user login status
                        if (!isset($_SESSION['user_name'])) {
                            echo "<li><a href='login.php'><strong>Home</strong></a></li>";
                            echo "<li><a href='about_us.php'><strong>About Us</strong></a></li>";
                            echo "<li><a href='register.php'><strong>Sign Up!</strong></a></li>";
                        } else {
                            echo "<li><a href='index.php'><strong>Home</strong></a></li>";
                            echo "<li><a href='profile.php'><strong>My Profile</strong></a></li>";
                            echo "<li><a href='social.php'><strong>Social</strong></a></li>";
                            echo "<li><a href='logoff.php'><strong>Log Out</strong></a></li>";
                        };
                        ?>
                    </ul>
                </nav>
            </header>
        </div>
        <main>