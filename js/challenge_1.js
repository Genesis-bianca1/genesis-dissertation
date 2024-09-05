//Challenge 1 logic

document.addEventListener('DOMContentLoaded', function() {

    // Drag functionality on Spanish phrases
    $('.draggable').on('dragstart', function(event) {
        event.originalEvent.dataTransfer.setData('text/plain', event.target.id);
    });

    // Drop functionality on English translations
    $('.droppable').on('dragover', function(event) {
        event.preventDefault(); // Prevent dropping items
    });

    $('.droppable').on('drop', function(event) {
        event.preventDefault();
        const draggableElementId = event.originalEvent.dataTransfer.getData('text');
        const droppableElementId = event.target.id;

        // Move the dragged element to the dropped position
        $(this).append($('#' + draggableElementId));
    });

    // Function on submit click response
    $('#submit').on('click', function() {
        let correctAnswers = 0;

        // Check if translations match each other correctly
        if ($('#hello').find('#hola').length) {
            correctAnswers++;
        }

        if ($('#good-morning').find('#buenos-dias').length) {
            correctAnswers++;
        }

        if ($('#good-night').find('#buenas-noches').length) {
            correctAnswers++;
        }

        // Provide feedback based on the number of correct answers
        if (correctAnswers === 3) {
            $('#feedback_1').text(`<p>"Great job! You matched all the greetings correctly."</p>`); //Checking if inverted speech marks are adequatly allowing editing the font-style
        } else {
            $('#feedback_1').text(`<p>"Oops, some matches are incorrect. The correct matches are: \n1. Hello = Hola\n2. Good morning = Buenos días\n3. Good night = Buenas noches."</p>`);
        }
    });
});