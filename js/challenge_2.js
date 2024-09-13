$(document).ready(function() {
    
    var dragged_element = null;
    //Defining the correct order of steps to match with data_step attributes
    var correct_order = [1, 2, 3, 4, 5, 6];
    //store the order of clicks
    var user_order =[];
    //points start-point
    var points = 0;

    //Click events logic

    //When number is dragged
    $("#spanish_numbers .list_item").on("dragstart", function(event) {
        dragged_element = event.target;
        $(this).css('opacity', '0.5'); //Semi-transparent when dragging
    });

    $("#spanish_numbers .list_item").on("dragend", function(event) {
        $(this).css('opacity', '1'); //Restore visibility when finished dragging
    });

    //Allow dropping the number on the task
    $("#task_steps .list_item").on("dragover", function(event) {
        event.preventDefault(); //Prevent default action of dropping 
    });

    $("task_steps .list_item").on("drop", function(event) {
        event.preventDefault();
        var task_element = $(this);
        var number = $(dragged_element).data('number');

        task_element.append(`<span class="number">$`)
    })

        var step_number = $(this).data("step"); //Get the step number
        user_order.push(step_number); //Add to user's selection

        //Check if user selected all steps
        if (user_order.length === correct_order.length) {
            check_order(); //Calling function to check if order is correct
        }
    });

    
    //Checking user's order against correct order
    function check_order() {
        points =0;

        //Loop through user's selection & compare with correct order
        for(var i =0; i < correct_order.length; i++)  {
            if (user_order[i] === correct_order[i]) {
                points++; //Adds points for each correct answer
            }
        }

        //Functionalities: Update progress bar as % & show progress
        var progress = (points / correct_order.length) * 100;
        $("#progress_percent").text(progress + "%");
        $("progress_bar").css("width", progress + "%");

        //Show feedback based on the result
        if (points === correct_order.length) {
            $("#feedback_message").text("Excellent work! You matched all the steps correctly");
        } else {
            $("#feedback_message").text("Good effort! Your matched " + points + "out of " + correct_order.length + " steps correctly.");
        }

        //Refresh list order for future attempts
        user_order = [];
    }

    //Call the "check order" function when user clicks submit button
    $("#submit_button").on("click", function() {
        check_order();
    });