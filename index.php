<?php
include_once 'header.php';

//If user not logged in, redirect to login page
if (!isset($_SESSION['u_name_id'])) {
    header("Location: login.php");
}
?>
<!-- Dashboard with exercises tagged here
1. Smart Flashcards with professional context: 
Theme - Office rooms flashcard
Content - Translations(hover) of office rooms in Spanish, sounds

2. Adaptive Learning Paths exercise:  --> 
            <div class="index-container">
                <h2>Let's Practice Now &#128221</h2>
                <div class="stats-container">
                    <div class=exercise-dashboard>
                    <?php
                        //Reveal different exercises options based on user login status
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