// Fonction de désactivation de l'affichage du formulaire
function desactivateForm(e) {
	
	var formulaire = document.getElementById('new_doc');
	
	if (e){
		formulaire.style.display = 'none';
	} else {
		formulaire.style.display = 'inline-block';
	}
}

//Fonction de désactivation de l'affichage de l'upload
function desactivateUpload() {
	
	var choix = document.getElementsByClassName('doc'),
		valeur = (choix[0].checked || choix[1].checked),
		zone = document.getElementById('sheet');
		
	if (valeur) {
		zone.style.display = 'inline-block';
	} else {
		zone.style.display = 'none';
	}
}

//On fait en sorte qu'en cliquant sur un choix, il se passe un truc
var choice = document.getElementById('choice');

choice.addEventListener('click',function(){
	desactivateUpload();
});

// On fait en sorte qu'en cliquant sur le lien, on ouvre le formulaire
var nouveau = document.getElementById('nouveau');

nouveau.addEventListener('click', function(){
	desactivateUpload();
	desactivateForm(false);
});

// On fait en sorte qu'en soumettant ou en annulant l'action du formulaire, ce dernier redisparaît
var new_doc = document.getElementById('new_doc');

new_doc.addEventListener('reset', function(){
	desactivateForm(true);
});

// On fait disparaître tout
desactivateForm(true);
desactivateUpload();

//On télécharge à l'ajout du fichier
var fileInput = document.querySelector('#file'),
    progress = document.querySelector('#progress');

fileInput.addEventListener('change', function() {
	var xhr = new XMLHttpRequest();

	xhr.open('POST', 'upload.php');

	xhr.upload.addEventListener('progress', function(e) {
		progress.value = e.loaded;
		progress.max = e.total;
	});
	
	var form = new FormData();
    form.append('file', fileInput.files[0]);

    xhr.send(form);
});