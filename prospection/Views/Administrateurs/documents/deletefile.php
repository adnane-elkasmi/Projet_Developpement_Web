<?php
	// On récupère l'adresse du fichier à supprimer
	$suppr = $_POST['hidden'];
	
	// On supprime le fichier une fois récupéré
	unlink($suppr);

	// Redirecting back
	header("Location:?view=documents");
?>