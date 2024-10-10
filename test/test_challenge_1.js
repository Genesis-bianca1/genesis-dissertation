//Unit Tests - 4/4 PASSED
function run_unit_test() {
    var tests_passed = 0;
    var test = document.getElementById("test");
    let output= "";

    //Test Case 1:
    let result = check_greeting_match("¡Hola!", "hello");
    console.log("Test 1: Spanish: '¡Hola!', English ID: 'hello', Result: ", result);
    if (result === true) {
        output += "Success! Test 1 Passed, ";
        tests_passed += 1;
    } else {
        output += "Error! Test 1 Failed, ";
    }

    //Test Case 2:
    result = check_greeting_match("¡Hola!", "good-morning");
    console.log("Test 2: Spanish: '¡Hola!', English ID: 'good-morning', Result: ", result);
    if (result === false) {
        output += "Test 2 Passed, ";
        tests_passed +=1;
    } else {
        output += "Test 2 Failed, ";
    }

    //Test Case 3:
    result = check_greeting_match("¡Buenos días!", "good-morning");
    console.log("Test 3: Spanish: '¡Buenos días!', English ID: 'good-morning', Result: ", result);
    if(result === true) {
        output += "Test 3 Passed and ";
        tests_passed += 1;
    } else {
        output += "Test 3 Failed and ";
    }

    //Test Case 4:
    result = check_greeting_match("Buenas noches", "good-afternoon");
    console.log("Test 4: Spanish: 'Buenas noches', English ID: 'good-afternoon', Result: ", result);
    if (result === false) {
        output += "Test 4 Passed.";
        tests_passed += 1;
    } else {
        output += "Test 4 Failed.";
    }

    output += `<p>Tests Passed: ${tests_passed}/4</p>`;
    test.innerHTML = output;
    
}

window.onload = run_unit_test;
