<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> Prospection EISTI </title>
		<link rel="stylesheet" href="style_navigation_principale.css" media="all"/>
		<link rel="stylesheet" href="style_fiche_lycees.css" media="all"/>
	</head>

	<body>
		<!-- On s'occupe maintenant de la PAGE -->
		<section>
			<!-- La navigation au sein de la page Gestion (Ajouter, Supprimer) -->
			<nav id="navigation_etablissements">
				<div id='sous_nav_ext'>
					<a href="?view=gestion" style='color:blue; text-decoration:none;'><div class="menu"><strong>AJOUTER</strong></div></a>
					<a href="?view=supprimer" style='color:black; text-decoration:none;'><div class="menu"><strong>SUPPRIMER</strong></div></a>
				</div>
			</nav>
			
			<article>
				<form action='?view=ajouter' method='post' style='width: 100%; margin-right: 15%; border'>
					<label for='Lycee'><strong>Etablissement: </strong></label><br /><input type='text' name='Lycee' style='margin-bottom: 20px; margin-top: 5px;'/><br />
					<label for='DateForum'><strong>Date du forum: </strong></label><br /><input type='date' name='DateForum' style='margin-bottom: 20px; margin-top: 5px;'/><br />
					<label for='Heure_Debut'><strong>Heure de début: </strong></label><br /><input type='time' name='Heure_Debut' style='margin-bottom: 20px; margin-top: 5px;'/><br />
					<label for='Heure_Fin'><strong>Heure de fin: </strong></label><br /><input type='time' name='Heure_Fin' style='margin-bottom: 20px; margin-top: 5px;'/><br />
					<label for='Courrier'><strong>Courrier: </strong></label><br /><input type='email' name='Courrier' style='margin-bottom: 20px; margin-top: 5px;'/><br />
					<label for='Public'><strong>Public: </strong></label><br /><textarea name='Public' style='margin-bottom: 20px; margin-top: 5px;'/></textarea><br />
					<label for='Annee_du_dernier_forum'><strong>Année du dernier forum: </strong></label><br /><input type='number' name='Annee_du_dernier_forum' style='margin-bottom: 20px; margin-top: 5px;'/><br />
					<label for='Type_de_prospection'><strong>Type de prospection: </strong></label><br /><input type='text' name='Type_de_prospection' style='margin-bottom: 20px; margin-top: 5px;'/><br />
					
					<div style='width: 100%; text-align: right; margin-top: 20px'>
						<input type='reset' value='Annuler' name='reset' style='margin-right: 5px;'/>
						<input type='submit' value='Ajouter' name='submit' />
					</div>
				</form>
			</article>
		</section>
	</body>
</html>