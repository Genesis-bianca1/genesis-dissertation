<?php
include_once 'header.php';

//If user not logged in, redirect to login page
if (!isset($_SESSION["u_id"])) {
    header("Location: login.php");
}
?>

<!--This page is under development, back-end complications prevented its completion in Sprint 5-->

                <div class="lock-container">
                    <h2>For you,<br>By you,<br>Because of you</h2>

                    <div class="slideshow">
                        <img class="slides" src="/19141230/img/anywhere.jpg">
                        <img class="slides" src="/19141230/img/locked.jpg">
                        <img class="slides" src="/19141230/img/plan.jpg">
                        <img class="slides" src="/19141230/img/scalate.jpg">
                        <img class="slides" src="/19141230/img/network.jpg">
                    </div>
                    <!--Lock settings form-->
                    <form id="lock" action="/19141230/includes/lock.inc.php" method="POST">
                    <label><strong>Make your own rules</strong><span style="font-size: 40px;">&#x1F512</span></label><br><br>
                        <!--Modity to enter date data types & time-->
                        <input type="s_date" name="s_date" placeholder="Start lockdown date" required><br><br>
                        <input type="e_date" name="e_date" placeholder="End lockdown date" required><br><br>
                        <input type="s_time" name="s_time" placeholder="Start time" required><br><br>
                        <input type="e_time" name="e_time" placeholder="End time" required><br>
                        <br>
                        <!--Submit settings to users_activity DB table-->
                        <button type="submit" name="submit"><big>Set Lockdown</big></button>
                    </form>
                </div>

                <!--Slideshow JavaScript logic-->
                <script>
                    var slide = 0;
                    carousel();

                    function carousel() {
                        var i;
                        var x =
                        document.getElementsByClassName("slides");
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = "none";
                        }
                        slide++;
                        if (slide > x.length) {slide = 1}
                        x[slide-1].style.display = "block";
                        setTimeout(carousel, 5000);
                    }
                </script>
<?php
include_once 'footer.php';
?>