<?php
include_once 'header.php';

//If user not logged in, redirect to login page
if (!isset($_SESSION['u_name_id'])) {
    header("Location: login.php");
}
?>

            <div class="profile-container">
                <div class="personal-info">
                    <h1>Profile &#128100</h1>
                    <!--Edit this WELCOME MESSAGE CODE-->
                    <button id="edit" type="submit">Edit my details</button>
                    <?php
                    //Check if user is logged in
                        //Display personalised welcome message
                        echo "<h2>Welcome " . $_SESSION['u_f_name_id'] ." " . $_SESSION['u_l_name_id'] . "! </h2>";
                        echo "<p>Email: " . $_SESSION["email_id"] . "</p>";
                        //URGENT CODE FOR PULLING INFORMATION ABOUT USERS CURRENT STATS ON:
                        //SOCIAL MEDIA LINK, PROGRESS, TOTAL SCORE, STRENGTHS, WEAKNESSES, HOBBIES & INTERESTS, GOALS
                    ?>


                </div>
            </div>
            
<?php
include_once 'footer.php';
?>