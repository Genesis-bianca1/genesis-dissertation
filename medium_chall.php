<?php
include_once 'header.php';

//If user not logged in, redirect to login page
if (!isset($_SESSION["u_id"])) {
    header("Location: login.php");
}

?>
            <!-- Return to index.php button-->
            <br><a id="return" href="index.php" alt="return"><strong>&#9204</strong></a>
            <div id="medium-challenge">
                
            <!--Medium difficulty quiz & progress bar-->
                <h3>Elementary job-related vocabulary</h3>
                <div class="progress-tracker">
                    <div id="progress-bar"></div>
                </div><br><br>
                
                <!--Quiz optional answers-->
                <p>How would you say "The meeting":</p>
                <button onclick="check_answer('incorrect')">Una reunión</button>
                <button onclick="check_answer('incorrect')">Una entrevista</button>
                <button onclick="check_answer('correct')">La reunión</button>
            </div>

            <!--JavaScripts-->
            <script src="/19141230/js/scripts.js"></script>
            <!--Check answers function-->
            <script src= "/19141230/js/medium_chall.js"></script>
<?php
include_once 'footer.php';
?>