function change() {
	let connexion = document.getElementById("connexion") ;
	let inscrire = document.getElementById('inscription');
	let titre = document.querySelector('h2');

	if (connexion.style.display === 'block' && inscrire.style.display === 'none') {
		connexion.style.display = 'none';
		inscrire.style.display = 'block';
		titre.innerHTML = "Inscription";
	}
		
	else{
		inscrire.style.display = 'block';
		connexion.style.display = 'none';
		titre.innerHTML = "Connexion";
	} 	
}