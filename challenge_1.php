<?php
include_once "header.php";
include_once "submit.inc.php";
//If user not logged in, redirect to login page
if (!isset($_SESSION["u_id"])) {
    header("Location: login.php");
}
?>      
            <!--Return to index.php Button-->
            <br><a id="return" href="index.php" alt="return"><strong>&#9204</strong></a>    
            <div id="exercise-container" class="exercise-container">
                <p><strong><big>¡Saludos! &#129309</big></strong><br>At every professional setting it is curtesy greeting your colleages, whether it is in the morning, evening, or night.<br><strong>Let's give this a go!</strong></p>
                <div class="progress-tracker">
                    <div id="progress-bar">0%</div>
                </div><br>
                <!--Spanish phrases-->
                <div id="list" class="greetings-container">
                    <ul id="spanish-list">
                        <li class="draggable" draggable="true" id="buenas-tardes"><strong>Buenas tardes</strong></li>
                        <li class="draggable" draggable="true" id="buenas-noches"><strong>Buenas noches</strong></li>
                        <li class="draggable" draggable="true" id="hola"><strong>¡Hola!</strong></li>
                        <li class="draggable" draggable="true" id="buenos-dias"><strong>¡Buenos días!</strong></li>
                    </ul>
                    <!--Empty droppable area-->
                    <ul id="list-drop">
                        <li class="droppable" id="hello"></li>
                        <li class="droppable" id="good-morning"></li>
                        <li class="droppable" id="good-afternoon"></li>
                        <li class="droppable" id="good-night"></li>
                    </ul>
                    <!--English translations-->
                    <ul id="english-list">
                        <li>Hello!</li>
                        <li>Good morning!</li>
                        <li>Good afternoon</li>
                        <li>Good night</li>
                    </ul>
                </div>
                <!--Submit answers-->
                <button id="submit"><big>Check Answers</big></button><br>

                <!--Feedback section-->
                <div id="feedback-1"></div>
                <div id="test"><p></p></div>
            </div>
            <!--JavaScripts & JQuery-->
            <script src="/19141230/js/challenge_1.js"></script>
            <script scr="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            
            <!-- Unit Test for exercise functionality below (remove comment tags to see results)
            <script src="/19141230/test/test_challenge_1.js"></script>
            -->
<?php
include_once 'footer.php';
?>