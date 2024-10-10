<?php
include_once 'header.php';
//If user not logged in, redirect to login page
if (!isset($_SESSION["u_id"])) {
    header("Location: login.php");
}
?>
            <!--Return to index.php button-->
            <br><a id="return" href="index.php" alt="return"><strong>&#9204</strong></a>
            <div id="exercise-container" class="exercise-container">
                <p><strong><big>Sending an Email &#128233</big></strong><br>Match the steps of sending an email with the correct order in Spanish!</p>
                <!--Progress bar-->
                <div class="progress-tracker">
                    <div id="progress-bar">0%</div>
                </div><br>
                <div id="list" class="steps-container">
                    <!--6-step lists-->
                    <ul id="spanish-numbers">
                        <li class="list_item" data-number="4" draggable="true"><strong>cuatro</strong></li>
                        <li class="list_item" data-number="1" draggable="true"><strong>uno</strong></li>
                        <li class="list_item" data-number="6" draggable="true"><strong>seis</strong></li>
                        <li class="list_item" data-number="3" draggable="true"><strong>tres</strong></li>
                        <li class="list_item" data-number="5" draggable="true"><strong>cinco</strong></li>
                        <li class="list_item" data-number="2" draggable="true"><strong>dos</strong></li>
                    </ul>
                    <!--Empty droppable area-->
                    <ul id="task-drop">
                        <li class="list_item" data-step="5"></li>
                        <li class="list_item" data-step="2"></li>
                        <li class="list_item" data-step="1"></li>
                        <li class="list_item" data-step="3"></li>
                        <li class="list_item" data-step="6"></li>
                        <li class="list_item" data-step="4"></li>
                    </ul>
                    <!--Steps of sending an email-->
                    <ul id="task-steps">
                        <li>Attach any necessary files</li>
                        <li>Enter the recipient's email address</li>
                        <li>Click "Compose" to start a new email</li>
                        <li>Write a subject line</li>
                        <li>Click "send"</li>
                        <li>Type your message</li>
                    </ul>
                </div>
                <!-- Submit button to check answers -->
                <button id="submit"><big>Check Answers</big></button>
                
                <!-- Feedback section -->
                <div id="feedback-2"></div>
            </div>
            
            <!--JavaScripts & JQuery-->
            <script src="/19141230/js/challenge_2.js"></script>
            <script scr="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            
<?php
include_once 'footer.php';
?>