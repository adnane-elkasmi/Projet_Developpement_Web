<?php
    // Base de données
    try{
        $pdo = new PDO(DSN,USERNAME,PASSWORD);
    }
    catch (PDOException $e){
        die("Error ! : " . $e->getTraceAsString());
    }
    
    // Récupérer l'utilisateur
    $username = $_SESSION['username'];

    // Chercher les informations de l'utilisateur
    $searchUser = $pdo->query("SELECT * FROM utilisateurs WHERE Username='$username'")->fetch(PDO::FETCH_BOTH);

    // Récupérer le campus
    $campus = isset($_GET["campus"]) ? str_replace(" ", "", $_GET["campus"]) : "" ;
    if ($campus == "Tout"){
        $campus = "";
    }

    // Récupérer le filtre
    $filtre = isset($_GET["filtre"]) ? str_replace(" ", "", $_GET["filtre"]) : "" ;
    if ($filtre == "Tout"){
        $filtre = "";
    }

    // Récupérer l'ordre
    $ordre = isset($_GET["ordre"]) ? str_replace(" ", "", $_GET["ordre"]) : "" ;
    if ($ordre == "Code_postal_(ordre_croissant)"){
        $ordre = "";
    }

    // Récupérer la date actuelle
    $date = '20' . date('y/m/d');

    // Chercher les informations des établissements n'ayant pas organisé de prospections selon le campus, l'ordre, et le filtre
    if ($campus == ""){
    	if ($ordre == ""){
    		switch ($filtre){
                case "Lycée":
                    $lycees = $pdo->query("SELECT * FROM lycee WHERE lycee.Id NOT IN (SELECT Lycee FROM forum) AND Type = 'Lycée' ORDER BY Code_Postal");
                    break;
                case "IUT":
                    $lycees = $pdo->query("SELECT * FROM lycee WHERE lycee.Id NOT IN (SELECT Lycee FROM forum) AND Type = 'IUT' ORDER BY Code_Postal");
                    break;
                default:
                    $lycees = $pdo->query("SELECT * FROM lycee WHERE lycee.Id NOT IN (SELECT Lycee FROM forum) ORDER BY Code_Postal");
                    break;
            }
	    }
	    else{
    		switch ($filtre){
                case "Lycée":
                    $lycees = $pdo->query("SELECT * FROM lycee WHERE lycee.Id NOT IN (SELECT Lycee FROM forum) AND Type = 'Lycée' ORDER BY Code_Postal DESC");
                    break;
                case "IUT":
                    $lycees = $pdo->query("SELECT * FROM lycee WHERE lycee.Id NOT IN (SELECT Lycee FROM forum) AND Type = 'IUT' ORDER BY Code_Postal DESC");
                    break;
                default:
                    $lycees = $pdo->query("SELECT * FROM lycee WHERE lycee.Id NOT IN (SELECT Lycee FROM forum) ORDER BY Code_Postal DESC");
                    break;
            }
		}
    }
    else{
        if ($campus == "Pau"){
        	if ($ordre == ""){
	    		switch ($filtre){
	                case "Lycée":
	                    $lycees = $pdo->query("SELECT * FROM lycee WHERE lycee.Id NOT IN (SELECT Lycee FROM forum) AND Type = 'Lycée' AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal");
	                    break;
	                case "IUT":
	                    $lycees = $pdo->query("SELECT * FROM lycee WHERE lycee.Id NOT IN (SELECT Lycee FROM forum) AND Type = 'IUT' AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal");
	                    break;
	                default:
	                    $lycees = $pdo->query("SELECT * FROM lycee WHERE lycee.Id NOT IN (SELECT Lycee FROM forum) AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal");
	                    break;
	            }
       		}
       		else{
	    		switch ($filtre){
	                case "Lycée":
	                    $lycees = $pdo->query("SELECT * FROM lycee WHERE lycee.Id NOT IN (SELECT Lycee FROM forum) AND Type = 'Lycée' AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC");
	                    break;
	                case "IUT":
	                    $lycees = $pdo->query("SELECT * FROM lycee WHERE lycee.Id NOT IN (SELECT Lycee FROM forum) AND Type = 'IUT' AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC");
	                    break;
	                default:
	                    $lycees = $pdo->query("SELECT * FROM lycee WHERE lycee.Id NOT IN (SELECT Lycee FROM forum) AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC");
	                    break;
	            }
       		}
       	}
        else{
        	if ($ordre == ""){
	    		switch ($filtre){
	                case "Lycée":
	                    $lycees = $pdo->query("SELECT * FROM lycee WHERE lycee.Id NOT IN (SELECT Lycee FROM forum) AND Type = 'Lycée' AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal");
	                    break;
	                case "IUT":
	                    $lycees = $pdo->query("SELECT * FROM lycee WHERE lycee.Id NOT IN (SELECT Lycee FROM forum) AND Type = 'IUT' AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal");
	                    break;
	                default:
	                    $lycees = $pdo->query("SELECT * FROM lycee WHERE lycee.Id NOT IN (SELECT Lycee FROM forum) AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal");
	                    break;
	            }
			}
			else{
	    		switch ($filtre){
	                case "Lycée":
	                    $lycees = $pdo->query("SELECT * FROM lycee WHERE lycee.Id NOT IN (SELECT Lycee FROM forum) AND Type = 'Lycée' AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC");
	                    break;
	                case "IUT":
	                    $lycees = $pdo->query("SELECT * FROM lycee WHERE lycee.Id NOT IN (SELECT Lycee FROM forum) AND Type = 'IUT' AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC");
	                    break;
	                default:
	                    $lycees = $pdo->query("SELECT * FROM lycee WHERE lycee.Id NOT IN (SELECT Lycee FROM forum) AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC");
	                    break;
	            }
			}
        }
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> Prospection EISTI </title>
	</head>

	<body style='margin-left:170px'>
		<!-- On s'occupe maintenant de la PAGE -->
		<section>
			<!-- La navigation au sein de la page Etablissements (Prospection, En attente, Pas de forum) -->
			<h2 style='text-align: center; margin-bottom: 0px; margin-top: 0px; background-color: #F2F2F2;'>Bienvenue <?php echo "$searchUser[3] $searchUser[4]"; ?></h2>
			<nav id="navigation_etablissements" style='background-color: #F2F2F2;'>
				<a href="?view=accueil_admin&pre=noForum" style='color:black; text-decoration:none;' id="prospection3"><div><strong>PROSPECTION</strong></div></a>
				<a href="?view=attente&pre=noForum" style='color:black; text-decoration:none;' id="attente3"><div><strong>EN ATTENTE</strong></div></a>
				<a href="?view=noForum&pre=noForum" style='color:black; text-decoration:none;' id="noForum3"><div><strong>PAS DE FORUM</strong></div></a>
			</nav>
			
			<?php
                echo "<ul class='search'>
						<li><p> Campus </p></li>
						<li>
							<select id='campus' size='1'>
                                <option>Tout</option>
								<option>Cergy</option>
								<option>Pau</option>
							</select>
						</li>
						<li><p> Filtre </p></li>
						<li>
							<select id='filtre' size='1'>
								<option>Tout</option>
								<option>Lycée</option>
								<option>IUT</option>
							</select>
						</li>
						<li><p> Ordre </p></li>
						<li>
							<select id='ordre' size='1'>
								<option>Code_postal_(ordre_croissant)</option>
								<option>Code_postal_(ordre_décroissant)</option>
							</select>
						</li>
						<li><input id='searchCampus' type='image' src='Pictures/Site/research.png' alt='loupe' width='24'></li>
					  </ul>";

			    echo "<script type='text/javascript'>
                        $(function() {
                            $('#searchCampus').click(function() {
                                campusChoice = $('#campus option:selected').text();
                                filtreChoice = $('#filtre option:selected').text();
                                ordreChoice = $('#ordre option:selected').text();
                                window.location.href ='?view=noForum&pre=noForum&campus=' + campusChoice + '&filtre=' + filtreChoice + '&ordre=' + ordreChoice;
                            });
                        });
                      </script>";
			?>

			<!-- On insère deux boutons qui vont permettre d'ajouter et de supprimer un établissement (JavaScript) -->
			<input type="button" value="ajouter un établissement" style='margin-bottom:10px;'/>
			<input type="button" value="supprimer un établissement" style='margin-bottom:10px; margin-left:5px'/>
			
			<!-- On insère le tableau des établissements -->
			<table>
				<tr style='background-color: #e1e4eb;'>
					<th>Type d'établissement</th>
					<th>Nom de l'établissement</th>
					<th>Code postal</th>
					<th>Ville</th>
					<th>Proche de</th>
				</tr>

				<?php
					foreach ($lycees as $lycee){
					  echo "<td>$lycee[1]</td>
							<td>$lycee[2]</td>
							<td>$lycee[3]</td>
							<td>$lycee[5]</td>
							<td>$lycee[6]</td>
						</tr>";
					}
				?>
			</table>
		</section>
	</body>
</html>