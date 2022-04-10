tinymce.init({
  selector: 'textarea', //selecteur pour tiny
  language: 'fr_FR', // pour changer la langue du menu
  plugins: 'advlist link image lists  code save', //le plugine sont des modul qu'on rajoute
  // toolbar: "undo redo | save | image code | fontsizeselect| fontselect | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | outdent indent",
  toolbar: 'undo redo  | save | styleselect | forecolor | bold italic | alignleft aligncenter alignright | outdent indent | link image | code',
  menubar: false,
  save_enablewhendirty: true,
  fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
  images_upload_url: '../../includes/postAcceptor.php',
  content_style:
    "@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@200&display=swap');",
  font_formats: "Arial=arial,helvetica,sans-serif; Courier New=courier new,courier,monospace; Outfit=Outfit; Marck Script='Marck Script'",
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
  
  // menu:{
  //   format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript | blockformats fontformats fontsizes align lineheight | forecolor backcolor | removeformat' },
  // }
  
});