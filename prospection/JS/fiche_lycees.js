// Fonction de désactivation de l'affichage d'un bloc
function desactivateDiv(e,identifiant) {
	
	var bloc = document.getElementById(identifiant);
	
	if (e){
		bloc.style.display = 'none';
	} else {
		bloc.style.display = 'block';
	}
}

comment.addEventListener('click', function(){
	desactivateDiv(false,'commentaires');
});

quitter.addEventListener('click', function(){
	desactivateDiv(true,'commentaires');
});

inscrits.addEventListener('click', function(){
	desactivateDiv(false,'photos');
});

ancien.addEventListener('click', function(){
	desactivateDiv(false,'conteneur_un');
});

reiteration.addEventListener('click', function(){
	desactivateDiv(false,'conteneur_deux');
});

annulation.addEventListener('click', function(){
	desactivateDiv(false,'conteneur_trois');
});

rapport.addEventListener('click', function(){
	desactivateDiv(false,'conteneur_quatre');
});

inscrits.addEventListener('dblclick', function(){
	desactivateDiv(true,'photos');
});

ancien.addEventListener('dblclick', function(){
	desactivateDiv(true,'conteneur_un');
});

reiteration.addEventListener('dblclick', function(){
	desactivateDiv(true,'conteneur_deux');
});

annulation.addEventListener('dblclick', function(){
	desactivateDiv(true,'conteneur_trois');
});

rapport.addEventListener('dblclick', function(){
	desactivateDiv(true,'conteneur_quatre');
});

desactivateDiv(true,'photos');
desactivateDiv(true,'conteneur_un');
desactivateDiv(true,'conteneur_deux');
desactivateDiv(true,'conteneur_trois');
desactivateDiv(true,'conteneur_quatre');
desactivateDiv(true,'commentaires');