<?php
include_once 'header.php';
?>
            <h1>Challenge - Match the steps to complete a task</h1>
            
            <div id="exercise-container" class="exercise-container">
                <h2>Sending an Email</h2>
                <p>Match the steps of sending an email wth the correct order in Spanish!</p>
                
                <div class="progress-tracker">
                    <p>Progress: <span id="progress">0%</span></p>
                    <div id="progress_bar" style="width: 0%; background-color: green; height: 3px;"></div>
                </div><br>
                
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
                <button id="submit"><big>Check Answers</big></button>
                
                <!-- Feedback section -->
                <div id="feedback_message"></div>
            </div>


            <script src="/19141230/js/challenge_2.js"></script>
            <script scr="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php
include_once 'footer.php';
?>