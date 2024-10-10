<?php
include_once 'header.php';
?>
            <!--Error handlers-->
            <div class="form-container">
            <div class=errors>
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "empty-log-fields") {
                            echo "<p>Fill in all fields!</p>";
                        } else if ($_GET["error"] == "invalid-u-name" || $_GET["error"] == "invalid-passw") {
                            echo "<p>Invalid username or password. Try again!</p>";
                        } else if ($_GET["error"] == "u-not-found") {
                            echo "<p>Account does not exist!</p>";
                        } else if ($_GET["error"] == "incorrect-login") {
                            echo "<p>Incorrect username or password!</p>";
                        } else if ($_GET["error"] == "prep-statement-failure") {
                            echo "<p>Oops! Could not retrieve your data.</p>";
                        } else if ($_GET["error"] == "form-submission-fail") {
                            echo "<p>Oops! Form submission failed.</p>";
                        } else if ($_GET["error"] == "none") {
                            header("Location: profile.php");
                        }
                    }
                    ?>
                </div>
                
                <!--To verify login inputs, POST user_name & user_password-->
                <div class="login-container">
                    <h1>Login</h1><br>
                    <form action="/19141230/includes/log.inc.php" method="POST">
                        <label><strong>Username</strong></label>
                        <input type="text" name="user_name" placeholder="Username" required>
                        <br><br>
                        <label><strong>Password</strong></label>
                        <input type="password" name="user_password" placeholder="Password" required>
                        <br><br>
                        <button type="submit" name="submit"><big>Log in</big></button>
                    </form>
                </div>
            </div>
            
            <!--JavaScripts-->
            <script src="/19141230/js/scripts.js"></script>
<?php
include_once 'footer.php';
?>