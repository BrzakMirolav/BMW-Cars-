// Ovo su podesavanja za video koji se ucitava na pocetnoj strani
let sviVideo = window.document.getElementsByTagName("video");

for(let i = 0 ; i < sviVideo.length ; i++)
sviVideo[i].muted = true;

let videoPocetna = window.document.querySelector("#videoPocetna");


function videoPlay(element) {
        element.play();
}

function videoPause(element) {
    element.pause();
 }

