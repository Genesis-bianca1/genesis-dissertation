<?php
include_once 'header.php';
?>
            <div class="form-container">
                <!--Error handling-->
                <div class=errors>
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "empty-reg-fields") {
                            echo "<p>Fill in every field!</p>";
                        } else if ($_GET["error"] == "invalid-u-name") {
                            echo "<p>Invalid username! Try another.</p>";
                        } else if ($_GET["error"] == "invalid-email") {
                            echo "<p>Invalid email! try another.</p>";
                        } else if ($_GET["error"] == "account-exists") {
                            echo "<p>You already have an account!";
                        } else if ($_GET["error"] == "invalid-passw") {
                            echo "<p>Choose an appropriate password!</p>";
                        } else if ($_GET["error"] == "unmatching-passws") {
                            echo "<p>Passwords do not match!</p>";
                        }else if ($_GET["error"] == "reg-fail") {
                            echo "<p>Oops! Registration failed.</p>";
                        } else if ($_GET["error"] == "prep-stmt-fail") {
                            echo "<p>Oops! Server error.</p>";
                        } else if ($_GET["error"] == "none") {
                            header("Location: login.php");
                        } 
                    }
                    ?>
                </div>
                <!--Registration from and mandatory fields-->
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
                        <button type="submit" name="submit"><big>Create Account</big></button>
                    </form>
                </div>
            </div>

<?php
include_once 'footer.php';
?>