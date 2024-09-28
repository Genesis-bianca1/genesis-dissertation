<?php
include_once 'header.php';

//If user not logged in, redirect to login page
if (!isset($_SESSION['u_name_id'])) {
    header("Location: login.php");
}
?>      
            <!--Return Button-->
            <br><a id="return" href="index.php" alt="return"><strong>&#9204</strong></a>    
            <div id="exercise-container" class="exercise-container">
                <p><strong><big>¡Saludos! &#129309</big></strong><br><small> At every professional setting it is curtesy greeting your colleages, whether it is in the morning, evening, or night.<br><strong>Let's give this a go!</strong></small></p>
                <div class="progress-tracker">
                    <div id="progress-bar">10%</div>
                </div>
                <!-- Spanish phrases list -->
                <div id="list" class="greetings-container">
                    <ul id="spanish-list">
                        <li class="draggable" draggable="true" id="buenas-tardes">Buenas tardes</li>
                        <li class="draggable" draggable="true" id="buenas-noches">Buenas noches</li>
                        <li class="draggable" draggable="true" id="hola">¡Hola!</li>
                        <li class="draggable" draggable="true" id="buenos-dias">¡Buenos días!</li>
                    </ul>
                    <ul id="english-list">
                        <li class="droppable" id="hello">Hello!</li>
                        <li class="droppable" id="good-morning">Good morning!</li>
                        <li class="droppable" id="good-evening">Good evening</li>
                        <li class="droppable" id="good-night">Good night</li>
                    </ul>
                </div>
                <button id="submit"><big>Check Answers</big></button>
                <!-- Submit button to check answers -->
                
                
                <!-- While points system is mandatory -->
                <!-- 3 core pages, home.php, social.php, challenge_1.php & scripts.js -->

                <!-- Focus on this exercise and integrate inclusive features which can be swtiched on/off-->
                <!-- For example, mp3 voice media, interactive images, different color-theme, streak-->
        
                
                <!-- Feedback section -->
                <div id="feedback_1"></div>
            </div>
            <!--JavaScripts-->
            <script src="/19141230/js/challenge_1.js"></script>
            <script scr="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
include_once 'footer.php';
?>