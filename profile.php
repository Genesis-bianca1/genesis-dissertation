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
                    <button id="edit" type="submit">Edit my details</button>
                    <h1>Profile &#128100</h1>
                    <p><strong>Bio: </strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><br>
                    
                    <!--Display user details on profile container-->
                    <?php
                        //From users DB table
                        echo "<h2>Welcome " . $_SESSION["u_f_name_id"] ." " . $_SESSION["u_l_name_id"] . "! </h2>";
                        echo "<p><strong>ID:</strong> " . $_SESSION["u_id"] . "</p>";
                        echo "<p><strong>Email:</strong> " . $_SESSION["email_id"] . "</p><br>";

                        echo"<h3>Performance Information:</h3>";
                        echo "<p><strong>Current Level:</strong> " . $_SESSION["level"] . "</p><br>";
                        
                        //From users_activity DB table
                        echo"<h3>Activity Information:</h3>";
                        echo "<p><strong>Streak:</strong> " . $_SESSION["record"] . "days</p>";
                        echo "<p><strong>Last session:</strong> " . $_SESSION["last_d_login"] .", " .  $_SESSION["last_t_login"] . "</p>";
                        echo "<p><strong>Commitment period:</strong> " . $_SESSION["start_date"] . ", " . $_SESSION["s_lock_t"] . " - " . $_SESSION["end_date"] . ", " . $_SESSION["e_lock_t"] . "</p>";
                    ?>
                    <p style="text-shadow: 5px 10px 5px white;">Think you will be going away for a while?<button id="freeze" type="submit">Freeze streak</button></p>
                </div>
            </div>
<?php
include_once 'footer.php';
?>