<?php
include_once 'header.php';

//If user not logged in, redirect to login page
if (!isset($_SESSION["u_id"])) {
    header("Location: login.php");
}
?>
            <!--Return to index.php button-->
            <br><a id="return" href="index.php" alt="return"><strong>&#9204</strong></a>
            <div id="exercise-container" class="exercise-container">
                <div id="easy-challenge">

                    <!--Easy level quiz & progress bar-->
                    <h3>Elementary job-related vocabulary</h3>
                    <div class="progress-tracker">
                        <div id="progress-bar"></div>
                    </div><br><br>
                    
                    <!--Optional answers-->
                    <p>Select the correct translation for "Reunión":</p>
                    <button onclick="check_answer('incorrect')">Interview</button>
                    <button onclick="check_answer('correct')">Meeting</button>
                    <button onclick="check_answer('incorrect')">Job</button>
                </div>
            </div>

            <!--JavaScrips-->
            <script src="/19141230/js/scripts.js"></script>
            <!--Check answers function-->
            <script src= "/19141230/js/easy_chall.js"></script>
<?php
include_once 'footer.php';
?>