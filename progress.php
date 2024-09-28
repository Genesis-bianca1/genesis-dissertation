<?php
include_once 'header.php';

//Check is user logged in
if (!isset($_SESSION['u_name_id'])) {
    header("Location: login.php");
}

?>

            <br><a id="return" href="index.php" alt="return"><strong>&#9204</strong></a>
            <div class="progress-container">
                <!--User enters progress related data to compare with original/previous data-->
                <div class="record">
                    <p><strong>What did you learn today?</strong></p>
                    <form action="/includes/record.inc.php" method="POST">
                        <textarea name="content" placeholder="New word of the day?" required></textarea>
                    </form>
                    <form action="/includes/record.inc.php" method="POST">
                        <p><strong>What was your weakness?</strong></p>
                        <textarea name="content" placeholder="Reading, listening, speaking ...?" required></textarea>
                    </form>
                    <form action="/includes/record.inc.php" method="POST">
                        <p><strong>What was your strength?</strong></p>
                        <textarea name="content" placeholder="I am good at ..." required></textarea>
                    </form>
                    <form action="/includes/record.inc.php" method="POST">
                        <p><strong>What will you do next?</strong></p>
                        <textarea name="content" placeholder="I can improve by ..." required></textarea>
                    </form><br>
                    <button>Update</button><br>
                </div>
                <!--Illustrates progress-related data previously entered by user-->
                <div class="record-results">
                    <p><strong><big>My Report</big></strong></p>
                    <table action="/includes/record.inc.php" method="POST">
                        <tbody>
                            <tr>
                                <td><span style='font-size:30px;'>&#128681 </span><strong>Original Goal</strong> <?php echo "<p>echo selected goal WITH timestamp</p>" ?></td>
                                <td><span style='font-size:30px;'>&#128161 </span><strong>My current focus</strong> <?php echo "<p>echo</p>" ?></td>
                            </tr>
                            <tr>
                                <td><span style='font-size:30px;'>&#128202 </span><strong>High Score</strong> <?php echo "<p>echo</p>" ?></td>
                                <td><span style='font-size:30px;'>&#128142 </span><strong>Total Score</strong> <?php echo "<p>echo</p>" ?></td>
                            </tr>
                            <tr>
                                <td><span style='font-size:30px;'>&#128204 </span><strong>My original weakness</strong> <?php echo "<p>echo</p>" ?></td>
                                <td><span style='font-size:30px;'>&#128204 </span><strong>My current weakness</strong> <?php echo "<p>echo</p>" ?></td>
                            </tr>
                            <tr>
                                <td><span style='font-size:30px;'>&#9889 </span><strong>My strenght</strong> <?php echo "<p>echo</p>" ?></td>
                                <td><span style='font-size:30px;'>&#9889 </span><strong>My current strenght</strong> <?php echo "<p>echo</p>" ?></td>
                            </tr>
                            <tr>
                                <td><span style='font-size:30px;'>&#9749 </span><strong>Streak</strong> <?php echo "<p>echo</p>" ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

<?php
include_once 'footer.php';
?>