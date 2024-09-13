function match_greeting (spanish, english) {
    const greetings = {
        "¡Hola!": "Hello!",
        "¡Buenos días!": "Good morning!",
        "Buenas tardes": "Good evening",
        "Buenas noches": "Good night"
    };

    return greetings[spanish] === english;
}
//UNIT TESTS
function run_unit_test() {
    //UNIT TEST case 1:
    let result = match_greeting("¡Hola!", "Hello!");
    console.log(result == true ? "Success! Test 1 Passed." : "Error! Test 1 Failed.");

    //UNIT TEST case 2:
    result = match_greeting("¡Hola!", "Good evening");
    console.log(result === false ? "Test 2 Passed" : "Test 2 Failed");

    //UNIT TEST case 3:
    result = match_greeting("¡Buenos días!", "Good morning!");
    console.log(result === true ? "Test 3 Passed" : "Test 3 Failed");

    //UNIT TEST case 4:
    result = match_greeting("Buenas noches", "Good morning");
    console.log(result === false ? "Test 4 Passed" : "Test 4 Failed");
}

window.onload = run_unit_test;


