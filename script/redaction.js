tinymce.init({
  selector: 'textarea', //selecteur pour tiny
  language: 'fr_FR', // pour changer la langue du menu
  height: 450,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor save',
    'searchreplace visualblocks code fullscreen emoticons',
    'insertdatetime media table paste imagetools wordcount'
  ], //le plugine sont des modul qu'on rajoute
  toolbar: 'undo redo | save | styleselect | fontselect | forecolor backcolor | bold italic emoticons| alignleft aligncenter alignright | bullist numlist outdent indent | link image media | code',
  menubar: false,
  save_enablewhendirty: true,
  fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
  // images_upload_url: '../../includes/postAcceptor.php', fonctionne mais dangereux
  
  //ajout de police d'écriture
  content_style:"@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@200&display=swap'); @import url('https://fonts.googleapis.com/css2?family=Marck+Script&display=swap');",
  font_formats: "Arial=arial,helvetica,sans-serif; Courier New=courier new,courier,monospace; Outfit=Outfit; Marck Script='Marck Script'",
  save_onsavecallback: function()
  {
    const rp = encodeURIComponent(tinyMCE.get('tiny').getContent());

    $.post( "../../includes/creer_RP.php", { text: rp})
    .done(function( data ) {
      window.location.href = 'Aventure.php?num='+data;

    });

  },
  
  
});