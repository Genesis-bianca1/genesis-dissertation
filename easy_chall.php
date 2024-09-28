<?php
include_once 'header.php';

//If user not logged in, redirect to login page
if (!isset($_SESSION['u_name_id'])) {
    header("Location: login.php");
}
?>
            <br><a id="return" href="index.php" alt="return"><strong>&#9204</strong></a>
            <div id="easy-challenge">
                <h3>Elementary job-related vocabulary</h3>
                <div class="progress-tracker">
                    <div id="progress-bar">10%</div>
                </div><br><br>
                <!-- INSERT IMAGE DEPICTING INTERVIEW HERE -->
                <p>Select the correct translation for "Reunión":</p>
                <button onclick="check_answer('incorrect')">Interview</button> <!-- ATTACH MP3 MEDIA TO SOUND WHEN ON CLICK -->
                <button onclick="check_answer('correct')">Meeting</button> <!-- ATTACH MP3 MEDIA TO SOUND WHEN ON CLICK -->
                <button onclick="check_answer('incorrect')">Job</button> <!-- ATTACH MP3 MEDIA TO SOUND WHEN ON CLICK -->
            </div>

            <script>
                function check_answer(answer) {
                    if (answer == 'correct') {
                        alert("Correct! Reunión means Meeting");
                        window.location.href = "save_progress.php?score=100&challenge_id=1";
                    } else {
                        aler("Incorrect translation. Try again");
                    }
                }
            </script>
            <script src="/19141230/js/scripts.js"></script>

            <!--After successful completition of the challenge provide a mini lesson where we explain the grammatic differences and rules of "una" reunión and "la" reunión-->
<?php
include_once 'footer.php';
?>