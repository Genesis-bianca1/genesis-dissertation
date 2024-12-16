<?php
include_once 'header.php';
include_once 'dbh.inc.php';

//If user not logged in, redirect to login page
if (!isset($_SESSION["u_id"])) {
    header("Location: login.php");
}

?>

<!--Profile container back-end has been under development for 3 weeks as it fails to fetch data from various DB tables-->

            <div class="profile-container">
                <div class="personal-info">
                    <h1>Profile</h1>
                    <img src="/19141230/img/avatar.png" alt="Avatar" class="avatar"><br>

                    <!--Display user details on profile container-->
                    <?php
                        //From users DB table
                        echo "<h2><big>" . $_SESSION["u_f_name_id"] ." " . $_SESSION["u_l_name_id"] . "</big></h2>";
                        echo "<p><strong>Bio</strong> ECM Alumni, OBU.</p><br>";
                        echo "<p><strong>ID</strong> " . $_SESSION["u_id"] . "</p>";
                        echo "<p><strong>Email</strong> " . $_SESSION["email_id"] . "</p><br>";
                    ?>
                    <button id="edit" type="submit">Edit my details</button>
                </div>
                <div class="personal-data">
                    <?php
                        echo"<h3><u>Performance Information</u></h3>";
                        echo "<p><strong>Current Level:</strong> " . $_SESSION["level"] . "</p><br>";
                        
                        //From users_activity DB table
                        echo"<h3><u>Activity Information</u></h3>";
                        echo "<p><strong>Streak:</strong> " . $_SESSION["u_streak"] . " days</p>";
                        echo "<p><strong>Last session:</strong> " . $_SESSION["last_login"] . "</p><br>";
                        echo"<h3><u>Learner Settings</u></h3>";
                        echo "<p><strong>Commitment Period:<br></strong> From <strong>" . $_SESSION["s_lock_d"] . "</strong>, at <strong>" . $_SESSION["s_lock_t"] . "</strong><br> Until <strong>" . $_SESSION["e_lock_d"] . "</strong>, at <strong>" . $_SESSION["e_lock_t"] . "</strong></p>";
                    ?>
                    <p><strong>Think you will be going away for a while?</strong><button id="freeze" type="submit">Freeze streak</button></p>
                </div>
            </div>
<?php
include_once 'footer.php';
?>