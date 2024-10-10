//Code still under development, attempting to identify errors.

document.addEventListener("DOMContentLoaded", function() {
    
    var dragged_number = null;
    //Defining the correct order of steps to match with data-step attributes
    var correct_order = [1, 2, 3, 4, 5, 6];
    //Users selected order
    var user_order =[];
    //Points start-point
    var points = 0;

    //Get all draggable numbers
    var number_items = document.querySelector("#spanish-numbers .list_item");
    number_items.forEach(function(item) {

        //Semi-transparent when dragging
        item.addEventListener("dragstart", function(event) {
            dragged_number = event.target;
            item.style.opacity = "0.5";
        });

        //Reset visibility when finished dragging
        item.addEventListener("dragend", function(event) {
            item.style.opacity = "1";
        });
    });

    //Get all droppable items
    var task_item = document.querySelectorAll("#task-drop .list_item");

    task_item.forEach(function(task) {
        //Allow dropping by preventing default behaviour
        task.addEventListener("dragover", function(event) {
            event.preventDefault();
        });
        //Drop event
        task.addEventListener("drop", function(event) {
            event.preventDefault();
            
            //Get number being dragged
            var number = dragged_number.getAttribute("data-number");
            //Get  step number of the task
            var step_number = task.getAttribute("data-step");

            if (!task.querySelector(".number")) {
                //Append dragged number to the task
                var span = document.createElement("span");
                span.className = "number";
                task.appendChild(span);

                //Add steps to user's order
                user_order.push(parseInt(step_number));
                //If all steps are selected, check order
                if(user_order.length === correct_order.length) {
                    check_order();
                }
            } else {
                alert("A number is already assigned to this step!");
            }
        });
    });

    //Checking user's order against correct order
    function check_order() {
        points = 0;

        //Loop through user's selection & compare with correct order
        for(var i =0; i < correct_order.length; i++)  {
            if (user_order[i] === correct_order[i]) {
                points++; //Adds points for each correct answer
            }
        }

        //Progress bar reflects exercise performance
        var prog_bar = document.getElementById("progress-bar");

        //Bar width reflects % of correct answer
        var score = (points / correct_order.length) * 100;
        prog_bar.style.width = score + "%";
        prog_bar.textContent = Math.round(score) + "%";

        var feedback = document.getElementById("feedback-2");
            //Show feedback based on the result
            if (points === correct_order.length) {
                feedback.innerHTML = `<p>Excellent work! You organised the task correctly</p>`;
            } else {
                feedback.innerHTML = `<p>Good effort! Your matched ` + points + `out of ` + correct_order.length + ` steps correctly.</p>`;
            }

            //Refresh list order for future attempts
            user_order = [];
        }

        //Check the order when the user clicks submit
        var submit_button = document.getElementById("submit");
        submit_button.addEventListener("click", function() {
            check_order();
        });
    });