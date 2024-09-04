//Challenge_2

let current_element = "";
let list_element = document.getElementById("numbers-list");
let initial_x = 0,
    initial_y = 0;

const is_touch_device = () => {
    try {
        document.createEvent("TouchEvent");
        return true;
    } catch (e) {
        return false;
    }
};

//Creating the list items
const generate_items = (count) => {
    const items = ["seis", "tres", "nueve", "cuatro", "uno", "siete", "diez", "dos", "cinco", "ocho"];
    for (let i = 0; i < count; i++) {
        list_element.innerHTML += `<li class="list_item" data_index="${i + 1}">${items[i]}</li>`;
    }
};


//Retrieving the position of an item based on its data attribute
const find_position = (index) => {
    let element_position;
    let list_items = document.querySelectorAll(".list_item");
    list_items.forEach((element, idx) => {
        let element_index = element.getAttribute("data_index");
        if (index == element_index) {
            element_position = idx;
        }
    });
    return element_position;
};

function start_drag(e) {
    initial_x = is_touch_device() ? e.touches[0].clientX : e.clientX;
    initial_y = is_touch_device() ? e.touches[0].clientY : e.clientY;
    current_element = e.target;
}

//Allow dropping
function allow_drop(e) {
    e.preventDefault();
}

const handle_drop = (e) => {
    e.preventDefault();
    let new_x = is_touch_device() ? e.touches[0].clientX : e.clientX;
    let new_y = is_touch_device() ? e.touches[0].clientY : e.clientY;

    let target_element = document.elementsFromPoint(new_x, new_y) [0];

    if (target_element && target_element.classList.contains("list_item")) {
        let current_index = current_element.getAttribute("data_index");
        let target_index = target_element.getAttribute("data_index");

        let[current_pos, target_pos] = [
            find_position(current_index),
            find_position(target_index),
        ];
        initial_x = new_x;
        initial_y = new_y;

        try {
            if (current_pos < target_pos) {
                target_element.insertAdjacentElement("afterend", current_element);
            } else {
                target_element.insertAdjacentElement("beforebegin", current_element);
            }
        } catch (error) {
            console.error("Error while moving element:", error);
        }
    }
};

window.onload = async () => {
    current_element = "";
    list_element.innerHTML = "";
    await generate_items(10);

    let list_items = document.querySelectorAll(".list_item");
    list_items.forEach((element) => {
        element.draggable = true;
        element.addEventListener("dragstart", start_drag, false);
        element.addEventListener("dragover", allow_drop, false);
        element.addEventListener("drop", handle_drop, false);
        element.addEventListener("touchstart", start_drag, false);
        element.addEventListener("touchmove", handle_drop, false);
    });
};