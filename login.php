<?php
include_once 'header.php';
?>
            <div class="form-container">
                <div class="login-container">
                    <h1>Login</h1><br>
                    <form action="/19141230/includes/log.inc.php" method="POST"> <!-- Function API login-->
                        <!--'required' html form validation for user ID-->
                        <label><strong>Username</strong></label>
                        <input type="text" name="user_name" placeholder="Username" required> <!--oninput="validate_user_id(this)"-->
                        <br><br>
                        <!--'required' html form validation for password-->
                        <label><strong>Password</strong></label>
                        <input type="password" name="user_password" placeholder="Password" required>
                        <br><br>
                        <button type="submit" name="submit"><big>Log in</big></button>
                    </form>
                </div>
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "empty-log-fields") {
                        echo "<p>Fill in all fields!</p>";
                    } else if ($_GET["error"] == "invalid-u-name" || "invalid-passw") {
                        echo "<p>Invalid username or password! Try again</p>";
                    } else if ($_GET["error"] == "u-not-found") {
                        echo "<p>User does not exist</p>";
                    } else if ($_GET["error"] == "wrong-passw" || "u-not-found") {
                        echo "<p>Incorrect username or password</p>";
                    } else if ($_GET["error"] == "prep-statement-failure") {
                        echo "<p>Oops! Something went wrong</p>";
                    } else if ($_GET["error"] == "none") {
                        header("profile.php");
                    }
                }
                ?>
            </div>
            <script src="/19141230/js/scripts.js"></script>

<?php
include_once 'footer.php';
?>