tinymce.init({
  selector: 'textarea', //selecteur pour tiny
  language: 'fr_FR', // pour changer la langue du menu
  plugins: 'advlist link image lists  code save', //le plugine sont des modul qu'on rajoute
  toolbar: "undo redo | image code | save",
  save_enablewhendirty: true,
  images_upload_url: '../../../includes/postAcceptor.php',
  save_onsavecallback: function()
  {
    const rp = encodeURIComponent(tinyMCE.get('tiny').getContent());
    // let user = $("#user").text;

    // console.log(text);
    $.post( "../../includes/creer_RP.php", { text: rp})
    .done(function( data ) {
      let text = "OK Pour aller vers l'histoire\n Cancel pour rester ici.";
      if (confirm(text) == true) {
        window.location.href = 'Aventure.php?num='+data;
      } 
    // alert( "Data Loaded: " + data );
    // window.location.href = 'Aventure.php?histoire='+data;
    });
    // var xmlhttp = new XMLHttpRequest();
    // xmlhttp.open("POST", "test.php", true);
    // xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    // xmlhttp.onreadystatechange = function() {
    //   if (this.readyState == 4 && this.status == 200) { // 4 si l'opération est terminer
    //     alert("Requête effectuée !");
    //     // console.log(this.responseText)
    //   }
    // };
   
    // xmlhttp.send(`text=${ text }`);
  },
  
  menu:{
    format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript | blockformats fontformats fontsizes align lineheight | forecolor backcolor | removeformat' },
  }
  
});