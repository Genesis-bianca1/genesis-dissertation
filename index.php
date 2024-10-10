<?php
include_once 'header.php';

//If user not logged in, redirect to login page
if (!isset($_SESSION["u_id"])) {
    header("Location: login.php");
}
?>
<!--Dashboard with language exercises & flashcard page linked in here--> 
            <div class="index-container">
                <h2>Let's Practice Now &#128221</h2>
                <div class="stats-container">
                    <div class=exercise-dashboard>
                        <?php
                            //Reveal & redirect to different exercises options & flashcard page as a 2x3 grid
                            echo "<div class='exercise-box'><a href='easy_chall.php'><strong>Easy</strong></a></div>";
                            echo "<div class='exercise-box'><a href='medium_chall.php'><strong>Medium</strong></a></div>";
                            echo "<div class='exercise-box'><a href='difficult_chall.php'><strong>Difficult</strong></a></div>";
                            echo "<div class='exercise-box'><a href='challenge_1.php'><strong>Extra Challenge</strong></a></div>";
                            echo "<div class='exercise-box'><a href='challenge_2.php'><strong>Learn a Skill</strong></a></div>";
                            echo "<div class='exercise-box'><a href='flashcard.php'><strong>My Revision Notes</strong></a></div>";
                        ?>
                    </div>
                </div>
            </div>
<?php
include_once 'footer.php';
?>