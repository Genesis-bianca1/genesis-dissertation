//Code is under development
//Level progression system that reveals the next hardest challenge when completing the previous correctly
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