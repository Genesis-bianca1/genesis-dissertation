//Challenge - Match the greeting! Logic

// Instead of $(document).ready(function() { ... });
document.addEventListener('DOMContentLoaded', function() {

    // Enable drag functionality on Spanish phrases
    $('.draggable').on('dragstart', function(event) {
        event.originalEvent.dataTransfer.setData('text/plain', event.target.id);
    });

    // Enable drop functionality on English translations
    $('.droppable').on('dragover', function(event) {
        event.preventDefault(); // Prevent default behavior to allow dropping
    });

    $('.droppable').on('drop', function(event) {
        event.preventDefault();
        const draggableElementId = event.originalEvent.dataTransfer.getData('text');
        const droppableElementId = event.target.id;

        // Move the dragged element to the dropped position
        $(this).append($('#' + draggableElementId));
    });

    // Instead of $('#submit').click(function() { ... });
    $('#submit').on('click', function() {
        let correctAnswers = 0;

        // Check if 'Hola' is matched with 'Hello'
        if ($('#hello').find('#hola').length) {
            correctAnswers++;
        }

        // Check if 'Buenos días' is matched with 'Good morning'
        if ($('#good-morning').find('#buenos-dias').length) {
            correctAnswers++;
        }

        // Check if 'Buenas noches' is matched with 'Good night'
        if ($('#good-night').find('#buenas-noches').length) {
            correctAnswers++;
        }

        // Provide feedback based on the number of correct answers
        if (correctAnswers === 3) {
            $('#feedback_1').text('Great job! You matched all the greetings correctly.');
        } else {
            $('#feedback_1').text('Oops, some matches are incorrect. The correct matches are: \n1. Hello = Hola\n2. Good morning = Buenos días\n3. Good night = Buenas noches.');
        }
    });
});