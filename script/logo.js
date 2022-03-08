let path = document.querySelectorAll('path');
Array.prototype.forEach.call(path, function (item) {
  item.classList.add("path");
});
