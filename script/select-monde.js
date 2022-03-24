function showUser(str) {
    if (str == "") {
      document.getElementById("txtHint").innerHTML = "";
      return;
    } else {
        
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) { // 4 si l'opération est terminer
            
          document.getElementById("txtHint").innerHTML = this.responseText;
        }console.log(this.readyState); console.log(this.status);
      };
      xmlhttp.open("GET","../../includes/getmonde.php?q="+str,true);
      xmlhttp.send();
    }
  }