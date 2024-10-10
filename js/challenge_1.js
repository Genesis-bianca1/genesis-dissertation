//Challenge 1 logic - Match Spanish greetings with its English translations 
document.addEventListener("DOMContentLoaded", function() {

    //Stores the id of the dragged greeting
    var dragged_string_id;

    //Drag functionality for items with class "draggable"
    var draggable_strings = document.querySelectorAll(".draggable");

    //Loop - when dragging starts store item's id in dragged_string_id
    draggable_strings.forEach(function(item) {
        item.addEventListener("dragstart", function(event) {
            dragged_string_id = event.target.id;
        });
    });

    //Drop functionality for "droppable" classes
    var droppable_strings = document.querySelectorAll(".droppable");

    //Loop - prevent dropping item selected
    droppable_strings.forEach(function(drop_zone) {
        drop_zone.addEventListener("dragover", function(event) {
            event.preventDefault();
        });

        drop_zone.addEventListener("drop", function(event) {
            event.preventDefault();

            var dragged_string = document.getElementById(dragged_string_id);

            //Append item to the drop zone to move it to English translation zone
            event.target.appendChild(dragged_string);
        });
    });
    
    //Submit
    var submit_button = document.getElementById("submit");

    //When clicking
    submit_button.addEventListener("click", function() {
        var correct_answers = 0;
        var exercise_name = "Match greetings translations";

        //Check if "hello" matches
        if (document.getElementById("hello").textContent  === "¡Hola!") {
            correct_answers += 1;
        }
        //Check if "good-morning" matches
        if (document.getElementById("good-morning").textContent  === "¡Buenos días!") {
            correct_answers += 1;
        }
        //Check if "good-evening" matches
        if (document.getElementById("good-afternoon").textContent  === "Buenas tardes") {
            correct_answers += 1;
        }
        //Check if "good-night" matches
        if (document.getElementById("good-night").textContent  === "Buenas noches") {
            correct_answers += 1;
        }

        //#progress-bar reflect % of correct answers from 4 Q"s
        var score = (correct_answers / 4) * 100;
        
        //Bar width reflects % of correct answers
        var prog_bar = document.getElementById("progress-bar");
        prog_bar.style.width = score + "%";
        prog_bar.textContent = Math.round(score) + "%";

        //Return feedback
        var feedback = document.getElementById("feedback-1");

        if (correct_answers === 4) {
            feedback.innerHTML = `<p>Great job! You matched all the greetings correctly.</p>`;
        } else {
            //Teaches correct translations
            feedback.innerHTML = `<p>Oops! Some matches were incorrect. The correct matches are:
            <br>1. Hello! = ¡Hola!
            <br>2. Good morning! = ¡Buenos días!
            <br>3. Good afternoon = Buenas tardes
            <br>4. Good night = Buenas noches</p>`;
        }
    });
});

//Unit Test Function
function check_greeting_match(spanish, english_id) {
    let correct_match = false;

    if (english_id === document.getElementById("hello").id && spanish === document.getElementById("hola").textContent) {
        correct_match = true;
    } else if (english_id === document.getElementById("good-morning").id && spanish === document.getElementById("buenos-dias").textContent) {
        correct_match = true;
    } else if (english_id === document.getElementById("good-afternoon").id && spanish === document.getElementById("buenas-tardes").textContent) {
        correct_match = true;
    } else if (english_id === document.getElementById("good-night").id && spanish === document.getElementById("buenas-noches").textContent) {
        correct_match = true;
    }
    return correct_match;
}