//GET next challenge when page loads
$(document).ready(function() {
    $.ajax({
        url: "exercise.inc.php",
        method: "GET",
        success: function(data) {
            
            //Loads easy, medium or difficult challenge
            if (data == 'easy') {
                $("#chall-container").load("easy_chall.php");
            } else if (data == 'medium') {
                $("#chall-container").load("medium_chall.php");
            } else {
                $("#chall-container").load("diff_chall.php");
            }
        }
    });
});


function locked_exercises()

//FILL BAR FUNCTION TO USE WHEN USER ANSWERS CORRECTLY TO EXERCISES
//SIMPLY CALL THE FUNCTION "function fill_bar()"
function fill_bar() {
    var bar = document.getElementById("progress-bar")
    var width = 10;
    var id = setInterval(frame, 10);
    function frame() {
        if (width >= 100) {
            clearInterval(id);
        } else {
            width++;
            bar.style.width = width + '%';
            bar.innetHTML = width * 1 + '%';
        }
    }
}