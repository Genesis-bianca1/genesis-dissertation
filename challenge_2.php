<?php
include_once 'header.php';
//If user not logged in, redirect to login page
if (!isset($_SESSION['u_name_id'])) {
    header("Location: login.php");
}
?>
            <br><a id="return" href="index.php" alt="return"><strong>&#9204</strong></a>
            <div id="exercise-container" class="exercise-container">
                <p><strong><big>Sending an Email &#128233</big></strong><br><small>Match the steps of sending an email with the correct order in Spanish!</small></p>
                <div class="progress-tracker">
                    <div id="progress-bar">10%</div>
                </div>
                <div id="list" class="steps-container">
                    <!--6-step lists-->
                    <ul id="task_steps">
                        <li class="list_item" data_step="5">Attach any necessary files</li>
                        <li class="list_item" data_step="2">Enter the recipient's email address</li>
                        <li class="list_item" data_step="1">Click "Compose" to start a new email</li>
                        <li class="list_item" data_step="3">Write a subject line</li>
                        <li class="list_item" data_step="6">Click "send"</li>
                        <li class="list_item" data_step="4">Type your message</li>
                    </ul>
                    <ul id="spanish_numbers">
                        <li class="list_item" draggable="true" data_number="4">cuatro</li>
                        <li class="list_item" draggable="true" data_number="1">uno</li>
                        <li class="list_item" draggable="true" data_number="6">seis</li>
                        <li class="list_item" draggable="true" data_number="3">tres</li>
                        <li class="list_item" draggable="true" data_number="5">cinco</li>
                        <li class="list_item" draggable="true" data_number="2">dos</li>
                    </ul>
                </div>
                <!-- Submit button to check answers -->
                <button id="submit"><big>Check Answers</big></button>
                
                <!-- Feedback section -->
                <div id="feedback_message"></div>
            </div>


            <script src="/19141230/js/challenge_2.js"></script>
            <script scr="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php
include_once 'footer.php';
?>