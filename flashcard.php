<?php
include_once 'header.php';

//If user not logged in, redirect to login page
if (!isset($_SESSION["u_id"])) {
    header("Location: login.php");
}

?>
            <!--Return to index.php button-->
            <br><a id="return" href="index.php" alt="return"><strong>&#9204</strong></a>
            <!--Flashcard-->    
            <h3 style="padding: 10px">My Flashcards</h3>
                <div class="flashcard-wrapper">
                    <div class="flashcard-body">
                        <!--Front content-->
                        <div class="flashcard-front">
                            <p>Front memo goes here</p>
                        </div>
                        <!--Back content-->
                        <div class="flashcard-back">
                            <p>Back memo goes here</p>
                        </div>
                    </div>
                </div>
<?php
include_once 'header.php';
?>