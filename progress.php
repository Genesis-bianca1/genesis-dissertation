<?php
include_once 'header.php';

//Check is user logged in
if (!isset($_SESSION["u_id"])) {
    header("Location: login.php");
}

?>
<!--Development of this page is on hold due to prioritising fixing database communication bugs between the tables-->

            <div class="progress-container">
                <!--User enters progress-related data to compare with original/previous data showed on record-results container-->
                <div class="record">
                    <!--Question & answers text area-->
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
                <!--Illustrates/prints progress-related data previously entered by user-->
                <div class="record-results">
                    <table action="/includes/record.inc.php" method="POST">
                        <tbody>
                            <tr>
                                <td><strong>Original Goal </strong><span style='font-size:30px;'> &#128681 </span> <?php echo "<p>My goal goes here...</p>" ?></td>
                                <td><strong>My current focus </strong><span style='font-size:30px;'> &#128161 </span> <?php echo "<p>My focus goes here...</p>" ?></td>
                            </tr>
                            <tr>
                                <td><strong>High Score </strong><span style='font-size:30px;'> &#128202 </span> <?php echo "<p>0%</p>" ?></td>
                                <td><strong>Total Score </strong><span style='font-size:30px;'> &#128142 </span> <?php echo "<p>0</p>" ?></td>
                            </tr>
                            <tr>
                                <td><strong>My original weakness </strong><span style='font-size:30px;'> &#128204 </span> <?php echo "<p>My weakness goes here...</p>" ?></td>
                                <td><strong>My current weakness </strong><span style='font-size:30px;'> &#128204 </span> <?php echo "<p>My weakness goes here...</p>" ?></td>
                            </tr>
                            <tr>
                                <td><strong>My strenght </strong><span style='font-size:30px;'> &#9889 </span><?php echo "<p>My strength goes here...</p>" ?></td>
                                <td><strong>My current strenght </strong><span style='font-size:30px;'> &#9889 </span> <?php echo "<p>My strength goes here...</p>" ?></td>
                            </tr>
                            <tr>
                                <td><strong>Streak </strong><span style='font-size:30px;'> &#9749 </span><?php echo "<p>0</p>" ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

<?php
include_once 'footer.php';
?>