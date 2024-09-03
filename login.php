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
                        <button type="submit" name="submit">Log in</button>
                    </form>
                </div>
            </div>
            <script src="/19141230/js/scripts.js"></script>

<?php
include_once 'footer.php';
?>