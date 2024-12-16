//Functions: On click play the respective sound.

//CHALLENGE 1 - AUDIOS
//1
let hola = document.getElementById("hola");
function play_hola() {
    let audio = new Audio("/19141230/audio/Hola.mp3");
    audio.play()
}
hola.addEventListener("click", play_hola);

//2
let buenos_dias = document.getElementById("buenos-dias");
function play_b_dias() {
    let audio = new Audio("/19141230/audio/Buenos_dias.mp3");
    audio.play()
}
buenos_dias.addEventListener("click", play_b_dias);

//3 ---- I STILL HAVEN'T RECORDED THIS ----
let buenas_tardes = document.getElementById("buenas-tardes");
function play_b_tardes() {
    let audio = new Audio("/19141230/audio/Buenas_tardes.mp3");
    audio.play()
}
buenas_tardes.addEventListener("click", play_b_tardes);

//4
let buenas_noches = document.getElementById("buenas-noches");
function play_b_noches() {
    let audio = new Audio("/19141230/audio/Buenas_noches.mp3");
    audio.play()
}
buenas_noches.addEventListener("click", play_b_noches);


//CHALLENGE 2 - AUDIOS
//1
let uno = document.getElementById("1");
function play_1() {
    let audio = new Audio("/19141230/audio/1.mp3");
    audio.play()
}
uno.addEventListener("click", play_1);

//2
let dos = document.getElementById("2");
function play_2() {
    let audio = new Audio("/19141230/audio/2.mp3");
    audio.play()
}
dos.addEventListener("click", play_2);

//3 ---- I STILL HAVEN'T RECORDED THIS ----
let tres = document.getElementById("3");
function play_3() {
    let audio = new Audio("/19141230/audio/3.mp3");
    audio.play()
}
tres.addEventListener("click", play_3);

//4
let cuatro = document.getElementById("4");
function play_4() {
    let audio = new Audio("/19141230/audio/4.mp3");
    audio.play()
}
cuatro.addEventListener("click", play_4);

//5
let cinco = document.getElementById("5");
function play_5() {
    let audio = new Audio("/19141230/audio/5.mp3");
    audio.play()
}
cinco.addEventListener("click", play_5);

//6
let seis = document.getElementById("6");
function play_6() {
    let audio = new Audio("/19141230/audio/6.mp3");
    audio.play()
}
seis.addEventListener("click", play_6);