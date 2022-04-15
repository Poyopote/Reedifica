var i = 0;
var images = [];
var texts = [];
var bouton = [];
var lien = [];

// image list
images[0] = 'img/20210407_160305.gif';
images[1] = 'img/20210407_161306.gif';
images[2] = 'img/20210729_191043.gif';

// text list
texts[0] = "À l'intention de nos chers Explorateurs, merci de faire partie des nôtres. Notre équipe travaille actuellement sur de nouvelles fonctionnalités, qui arriveront prochainement. (Alors un peu de patience!)";
texts[1] = "Venez découvrir l'histoire d'Arena de la destruction. L'illustre à l'origine.Du conflit !"
texts[2] = "Tu ne le sais donc pas ? Oliver Vieira est sur le forum. Découvre son histoire."

// bouton list
bouton[0] = "Se connecter";
bouton[1] = "Aller voir";
bouton[2] = "Découvrir";

// lien list
lien[0] = "Page/Utilisateur/connexion.php";
lien[1] = "Page/Histoire/contexte.php";
lien[2] = "Page/Membres/Liste.php";

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
window.onload = document.getElementsByName("carousel_bouton")[0].innerText = bouton[i];
window.onload = document.getElementsByName("carousel_lien")[0].setAttribute("href", lien[i]);

// change text
function changeTextLeft(counter) {
    document.getElementsByName("carousel_text")[0].innerText = texts[counter];
    document.getElementsByName("carousel_bouton")[0].innerText = bouton[counter];
    document.getElementsByName("carousel_lien")[0].setAttribute("href", lien[counter]);
}

function changeTextRight(counter) {
    document.getElementsByName("carousel_text")[0].innerText = texts[counter];
    document.getElementsByName("carousel_bouton")[0].innerText = bouton[counter];
    document.getElementsByName("carousel_lien")[0].setAttribute("href", lien[counter]);
}