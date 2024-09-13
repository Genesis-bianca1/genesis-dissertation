<?php
include_once 'header.php';
?>
            <h1>Challenge - Match the translations</h1>
            
            <div id="exercise-container" class="exercise-container">
                <h2>Greetings!</h2>
                <p>At every professional setting is curtesy greeting your colleages, whether it is in the morning, evening, or night. <strong>Let's give this a go!</strong></p><br>
                
                <div class="progress-tracker">
                    <p>Progress: <span id="progress">0%</span></p>
                <div id="progress_bar" style="width: 0%; background-color: green; height: 10px;"></div>
                </div><br>
                
                <!-- Spanish phrases list -->
                <div class="spanish-phrases">
                <h3>Spanish Greetings</h3>
                    <ul id="spanish-list">
                        <li class="draggable" draggable="true" id="buenas-tardes">Buenas tardes</li>
                        <li class="draggable" draggable="true" id="buenas-noches">Buenas noches</li>
                        <li class="draggable" draggable="true" id="hola">¡Hola!</li>
                        <li class="draggable" draggable="true" id="buenos-dias">¡Buenos días!</li>
                    </ul>
                </div>
                <!-- English phrases list -->
                <div class="english-phrases">
                <h3>English Greetings</h3>
                    <ul id="english-list">
                        <li class="droppable" id="hello">Hello!</li>
                        <li class="droppable" id="good-morning">Good morning!</li>
                        <li class="droppable" id="good-evening">Good evening</li>
                        <li class="droppable" id="good-night">Good night</li>
                    </ul>
                </div><br><br>
                <!-- Submit button to check answers -->
                <button id="submit"><big>Check Answers</big></button>
                
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