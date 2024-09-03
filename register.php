<?php
include_once 'header.php';
?>
            <div class="form-container">
                <div class="register-container">
                    <h1>Sign Up</h1>
                    <form action="/19141230/includes/register.inc.php" method="POST">
                        <label><strong>Username</strong></label>
                        <input type="text" name="user_name" placeholder="The username you will use to log in" required>
                        <br>
                        <label><strong>First name</strong></label>
                        <input type="text" name="first_name" placeholder="Your name" required>
                        <br>
                        <label><strong>Last name</strong></label>
                        <input type="text" name="last_name" placeholder="Your surname" required>
                        <br>
                        <label><strong>Email</strong></label>
                        <input type="text" name="e-mail" placeholder="Enter a valid e-mail address" required>
                        <br>
                        <label><strong>Password</strong></label>
                        <input type="password" name="user_password" placeholder="Password max 20 characters (incl. special chars and numbs)" required>
                        <br>
                        <label><strong>Repeat Password</strong></label>
                        <input type="password" name="repeat_password" placeholder="Repeat your password" required>
                        <br><br>
                        <button type="submit" name="submit"><strong>Create Account</strong></button>
                    </form>
                </div>
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "empty-fields") {
                        echo "Fill in every field";
                    } else if ($_GET["error"] == "invalid-username") {
                        echo "Invalid username, try another";
                    } else if ($_GET["error"] == "invalid-email") {
                        echo "Invalid email, try another";
                    } else if ($_GET["error"] == "invalid-password") {
                        echo "Choose an appropriate password";
                    } else if ($_GET["error"] == "unmatching-passwords") {
                        echo "Passwords do not match";
                    } else if ($_GET["error"] == "prep-statement-failure") {
                        echo "Oops! Server error";
                    } else if ($_GET["error"] == "none") {
                        echo "Success!";
                    } 
                }
                ?>
            </div>

<?php
include_once 'footer.php';
?>