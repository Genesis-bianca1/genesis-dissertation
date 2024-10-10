<?php
include_once 'header.php';

//If user not logged in, redirect to login page
if (!isset($_SESSION["u_id"])) {
    header("Location: login.php");
}
?>
            <!-- Return to index.php button-->
            <br><a id="return" href="index.php" alt="return"><strong>&#9204</strong></a>
            <div id="difficult-challenge">
                
                <!--Difficult level quiz-->
                <h3>Elementary job-related vocabulary</h3>
                <div class="progress-tracker">
                    <div id="progress-bar"></div>
                </div><br><br>
                
                <!--Optional answers-->
                <p>Select the correct translation for "The meeting is today":</p>
                <button onclick="check_answer('correct')">La reunión es hoy</button>
                <button onclick="check_answer('incorrect')">La reunión es ahora</button>
                <button onclick="check_answer('incorrect')">La entrevista es mañana</button>
            </div>

            <!--JavaScripts-->
            <script src="/19141230/js/scripts.js"></script>
            <!--Check answer function-->
            <script src= "/19141230/js/difficult_chall.js"></script>

<?php
include_once 'footer.php';
?>