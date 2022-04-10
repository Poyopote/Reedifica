function showUser(str) {
    if (str == "") {
      document.getElementById("txtHint").innerHTML = "";
      return;
    } else {
      showUser_2(str);

    //   $('select').children().each(function (){
    //     if(str == 1){
    //       $('main').css("background-image", "url(../../img/observatoire_vue1.jpg)");
    //     }
    //     if(str == 2){
    //       $('main').css("background-image", "url(../../img/bataille_vue1.jpg)");
    //     }
    //     if(str == 3){
    //       $('main').css("background-image", "url(../../img/Matte_painting_94.jpg)");
    //     }
    // });

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) { // 4 si l'opération est terminer
          document.getElementById("txtHint").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET","../../includes/getmonde.php?q="+str,true);
      xmlhttp.send();
    }
  }

  function showUser_2(str) {
    if (str == "") {
      document.getElementById("txtHint2").innerHTML = "";
      return;
    } else {
        
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) { // 4 si l'opération est terminer
          document.getElementById("txtHint2").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET","../../includes/getsousmonde.php?q="+str,true);
      xmlhttp.send();
    }
  }