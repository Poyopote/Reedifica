var i = 0;
var images = [];
var texts = [];
var bouton = [];
var lien = [];

// image list
images[0] = 'img/Reedifica-img03.webp';
images[1] = 'img/Reedifica-img01.gif';
images[2] = 'img/Reedifica-img02.webp';

// text list
texts[0] = "À l'intention de nos chers Explorateurs, merci de faire partie des nôtres. Notre équipe travaille actuellement sur de nouvelles fonctionnalités, qui arriveront prochainement. (Alors un peu de patience!)";
texts[1] = "Venez découvrir l'histoire d'Arena de la destruction. L'illustre à l'origine.Du conflit !"
texts[2] = "Tu ne le sais donc pas ? Oliver Vieira est sur le forum. Découvre son histoire."

// bouton list
bouton[0] = "Se connecter";
bouton[1] = "Aller voir";
bouton[2] = "Découvrir";

// lien list
lien[0] = "window.location.href = 'Page/Utilisateur/connexion.html'";
lien[1] = "window.location.href = 'Page/Histoire/contexte.html#arc'";
lien[2] = "window.location.href = 'Page/Membres/Liste.html'";

// change image
function changeImgLeft() {
if (i > 0) {
        i--;
    } else {
        i = 2;
    }
    changeTextLeft(i);
    
    document.getElementById("slideImg").src = images[i];
}

function changeImgRight() {
if (i < images.length - 1) {
        i++;
    } else {
        i = 0;
    }
    changeTextRight(i);
    
    document.getElementById("slideImg").src = images[i];
}

window.onload = document.getElementById("slideImg").src = images[i];
window.onload = document.getElementById("carousel_p").innerText = texts[i];
window.onload = document.getElementById("carousel_bouton").innerText = bouton[i];
window.onload = document.getElementById("carousel_bouton").setAttribute("onclick", lien[i]);

// change text
function changeTextLeft(counter) {
    document.getElementById("carousel_p").innerText = texts[counter];
    document.getElementById("carousel_bouton").innerText = bouton[counter];
    document.getElementById("carousel_bouton").setAttribute("onclick", lien[counter]);
}

function changeTextRight(counter) {
    document.getElementById("carousel_p").innerText = texts[counter];
    document.getElementById("carousel_bouton").innerText = bouton[counter];
    document.getElementById("carousel_bouton").setAttribute("onclick", lien[counter]);
}