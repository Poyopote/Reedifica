var i = 0;
var images = [];
var texts = [];

// image list
images[0] = 'https://www.w3schools.com/bootstrap/la.jpg';
images[1] = 'https://www.w3schools.com/bootstrap/chicago.jpg';
images[2] = 'https://www.w3schools.com/bootstrap/ny.jpg';

// text list
texts = ['Lorem us accumsan et viverra penatibus et magnis  dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.','Text1','Text2'];

// change image
function changeImgLeft() {
if (i > 0) {
        i--;
    } else {
        i = 2;
    }
    changeTextLeft(i);
    
    document.slide.src = images[i];
}

function changeImgRight() {
if (i < images.length - 1) {
        i++;
    } else {
        i = 0;
    }
    changeTextRight(i);
    
    document.slide.src = images[i];
}

window.onload = document.slide.src = images[i];
window.onload = document.getElementsByName("carousel_text")[0].innerText = texts[i];

// change text
function changeTextLeft(counter) {
    document.getElementsByName("carousel_text")[0].innerText = texts[counter];
}

function changeTextRight(counter) {
    document.getElementsByName("carousel_text")[0].innerText = texts[counter];
}