<?php
include_once 'header.php';

//If user not logged in, redirect to login page
if (!isset($_SESSION['u_name_id'])) {
    header("Location: login.php");
}

?>
            <br><a id="return" href="index.php" alt="return"><strong>&#9204</strong></a>
            <div id="medium-challenge">
                <h3>Elementary job-related vocabulary</h3>
                <div class="progress-tracker">
                    <div id="progress-bar">10%</div>
                </div><br><br>
                <p>How would you say "The meeting":</p>
                <button onclick="check_answer('incorrect')">Una reunión</button> <!-- ATTACH MP3 MEDIA TO SOUND WHEN ON CLICK -->
                <button onclick="check_answer('incorrect')">Una entrevista</button> <!-- ATTACH MP3 MEDIA TO SOUND WHEN ON CLICK -->
                <button onclick="check_answer('correct')">La reunión</button> <!-- ATTACH MP3 MEDIA TO SOUND WHEN ON CLICK -->
            </div>
            <script>
                function check_answer(answer) {
                    if (answer == 'correct') {
                        alert("Correct! 'La reunión' means 'the meeting'");
                        window.location.href = "save_progress.php?score=75&challenge_id=2";
                    } else {
                        aler("Incorrect translation. Try again");
                    }
                }
            </script>

            <!--After successful completition of the challenge provide a mini lesson where we explain the grammatic rules and explanation of the meaning of "es" and "es" in combination with "hoy", "mañana, "ahora". E.g. Es hoy, es mañana, es ahora, in context of "la reunión"-->

            <script src="/19141230/js/scripts.js"></script>
<?php
include_once 'footer.php';
?>