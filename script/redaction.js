tinymce.init({
  selector: 'textarea', //selecteur pour tiny
  language: 'fr_FR', // pour changer la langue du menu
  plugins: 'advlist link image lists  code', //le plugine sont des modul qu'on rajoute
  toolbar: "undo redo | image code ",
  save_enablewhendirty: true,
  images_upload_url: '../../../includes/postAcceptor.php',
  // save_onsavecallback: function()
  // {


  //   const text = encodeURIComponent(tinyMCE.get('tiny').getContent());
  //   // var user = tinyMCE.get('tiny').getContent()

  //   console.log(text);
    
  //   var xmlhttp = new XMLHttpRequest();
  //   xmlhttp.onreadystatechange = function() {
  //     if (this.readyState == 4 && this.status == 200) { // 4 si l'opération est terminer
  //       alert("Requête effectuée !")
  //       console.log(this.responseText)
  //     }
  //   };
  //   xmlhttp.open("POST", "test.php", true);
  //   xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  //   xmlhttp.send(`text=${ text }&user=<?php echo $user_pseudo; ?>`);
  // },
  menu:{
    format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript | blockformats fontformats fontsizes align lineheight | forecolor backcolor | removeformat' },
  }
  
});
  
function sauvegarde() {
  {
    let user = $("#user").text;
    const text = encodeURIComponent(tinyMCE.get('tiny').getContent());
    // var user = tinyMCE.get('tiny').getContent()

    console.log(text);
    console.log(user);
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) { // 4 si l'opération est terminer
        alert("Requête effectuée !")
        console.log(this.responseText)
      }
    };
    xmlhttp.open("POST", "test.php", true);
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xmlhttp.send(`text=${ text }&user=${user}`);
  }
}