<?php
include_once 'header.php';

//If user not logged in, redirect to login page
if (!isset($_SESSION['u_name_id'])) {
    header("Location: login.php");
}
?>
            <br><a id="return" href="index.php" alt="return"><strong>&#9204</strong></a>
            <div id="difficult-challenge">
                <h3>Elementary job-related vocabulary</h3>
                <div class="progress-tracker">
                    <div id="progress-bar">10%</div>
                </div><br><br>
                <p>Select the correct translation for "The meeting is today":</p>
                <button onclick="check_answer('correct')">La reunión es hoy</button>
                <button onclick="check_answer('incorrect')">La reunión es ahora</button>
                <button onclick="check_answer('incorrect')">La entrevista es mañana</button>
            </div>
            <script>
                function check_answer(answer) {
                    if (answer == 'correct') {
                        alert("Correct! 'La reunión es hoy' means 'The meeting is today'");
                        window.location.href = "save_progress.php?score=100&challenge_id=3";
                    } else {
                        aler("Incorrect translation. Try again");
                    }
                }
            </script>
            <script src="/19141230/js/scripts.js"></script>
<?php
include_once 'footer.php';
?>