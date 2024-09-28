<?php
include_once 'header.php';

//If user not logged in, redirect to login page
if (!isset($_SESSION['u_name_id'])) {
    header("Location: login.php");
}

?>
            <br><a id="return" href="index.php" alt="return"><strong>&#9204</strong></a>
                <h3>My Flashcards</h3>
                <div class="flashcard-wrapper">
                    <div class="flashcard-body">
                        <div class="flashcard-front">
                            <p>Front memo goes here</p>
                        </div>
                        <div class="flashcard-back">
                            <p>Back memo goes here</p>
                        </div>
                    </div>
                </div>


<?php
include_once 'header.php';
?>