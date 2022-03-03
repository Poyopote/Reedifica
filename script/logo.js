
// function ajout(){
//     Path = document.querySelectorAll("path");
//     Path.classList.add("path");
// };

// let path = document.querySelectorAll('p');

// function ajout(){
//     let path;
 
//     console.log(path);
//     path.classList.add("salut");

// };


let path = document.querySelectorAll('path');
Array.prototype.forEach.call(path, function (item) {
  item.classList.add("path");
});


// ajout();
