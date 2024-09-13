//Challenge 1 logic
document.addEventListener('DOMContentLoaded', function() {

    //Stores the id of the dragged phrases
    var dragged_phrase_id;

    //Add drag functionality to all elements with the 'draggable' class (Spanish phrases)
    var draggable_phrases = document.querySelectorAll('.draggable');

    //Loop - when draggin starts store its id in dragged_phrase_id
    draggable_phrases.forEach(function(item) {
        item.addEventListener('dragstart', function(event) {
            dragged_phrase_id = event.target.id;
        });
    });

    //English translations to accept Spanish phrases
    //drop functionality to 'droppable' classes
    var droppable_phrases = document.querySelectorAll('.droppable');

    //Loop - 
    droppable_phrases.forEach(function(dropZone) {
        dropZone.addEventListener('dragover', function(event) {
            event.preventDefault(); //Prevent dropping item selected
        });

        dropZone.addEventListener('drop', function(event) {
            event.preventDefault();

            var dragged_phrase = document.getElementById(dragged_phrase_id);

            //Append item to the drop zone to move it to english translation zone
            event.target.appendChild(dragged_phrase);
        });
    });

    //Submitting logic
    var submit_button = document.getElementById('submit');

    //When clicking
    submit_button.addEventListener('click', function() {
        var correct_answers = 0;

        //Check if 'hello' matches
        if (document.getElementById('hello').textContent  === '¡Hola!') {
            correct_answers += 1;
        }
        //Check if 'good-morning' matches
        if (document.getElementById('good-morning').textContent  === '¡Buenos días!') {
            correct_answers += 1;
        }
        //Check if 'good-evening' matches
        if (document.getElementById('good-evening').textContent  === 'Buenas tardes')) {
            correct_answers += 1;
        }
        //Check if 'good-night' matches
        if (document.getElementById('good-night').textContent  === 'Buenas noches') {
            correct_answers += 1;
        }

        var feedback_area = document.getElementById('feedback_1');

        if (correct_answers === 4) {
            feedback_area.innerHTML = `<p>Great job! You matched all the greetings correctly.</p>`;
        } else {
            feedback_area.innerHTML = `<p>Oops! Some matches were incorrect. The correct matches are:
            <br>1. Hello! = ¡Hola!
            <br>2. Good morning! = ¡Buenos días!
            <br>3. Good evening = Buenas tardes
            <br>4. Good night = Buenas noches</p>`;
        }
    });