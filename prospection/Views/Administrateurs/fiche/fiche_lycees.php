<?php
    // Récupérer l'id de la prospection
    $id = isset($_GET["id"]) ? $_GET["id"] : "" ;

    // Base de données
    try{
        $pdo = new PDO(DSN,USERNAME,PASSWORD);
    }
    catch (PDOException $e){
        die("Error ! : " . $e->getTraceAsString());
    }

    // Chercher les informations de la prospection
    $forum = $pdo->query("SELECT * FROM forum, lycee, contactlycee WHERE Lycee = lycee.Id AND Lycee = Idlycee AND forum.Id = $id")->fetch(PDO::FETCH_BOTH);

    // Récupérer l'utilisateur
    $username = $_SESSION['username'];

    // Chercher les informations de l'utilisateur
    $searchUser = $pdo->query("SELECT * FROM utilisateurs WHERE Username='$username'")->fetch(PDO::FETCH_BOTH);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> Prospection EISTI </title>
		<link rel="stylesheet" href="../../../CSS/style_navigation_principale.css" media="all"/>
		<link rel="stylesheet" href="../../../CSS/style_fiche_lycees.css" media="all"/>
	</head>

	<body>
		<!-- On s'occupe maintenant de la PAGE -->
		<section style='padding-top: 20px'>
			<article>
				<?php
			        if (!empty($_POST['description']) && isset($_POST['etudiants'])){
						$description = $_POST ['description'];
			            try{
							$pdo->exec("UPDATE lycee SET Commentaire1 = Commentaire1 + '$description' WHERE Id = $id");
			                    header("Location:$commentaire");
			                    exit();
									echo "<script>
									        $('#confirmation').text('Le commentaire 1 (étudiants) a été mis à jour.')
			                              </script>";
			            }
			            catch (PDOException $e){
			                die("Error ! : " . $e->getTraceAsString());
			            }
			        }
				?>

				<div id='information'>
					<div id='filiation'>
						<a href='#' id='modifier' style='text-decoration: none;'>Modifier</a><br />
						<h2 style='text-align: center;'>
							<?php echo "$forum[8] au $forum[13] $forum[14]"; ?>
							<br/>
							<?php
								$tabDate = explode('/', $forum[2]);
								$timestamp = mktime(0, 0, 0, $tabDate[1], $tabDate[2], $tabDate[0]);
								$jour = date('D', $timestamp);
								switch ($jour){
				                    case "Mon":
				                        $jour = "Lundi";
				                        break;
				                    case "Tue":
				                        $jour = "Mardi";
				                        break;
				                    case "Wed":
				                        $jour = "Mercredi";
				                        break;
				                    case "Thu":
				                        $jour = "Jeudi";
				                        break;
				                    case "Fri":
				                        $jour = "Vendredi";
				                        break;
				                    case "Sat":
				                        $jour = "Samedi";
				                        break;
				                    case "Sun":
				                        $jour = "Dimanche";
				                        break;
				                }
               					echo "$jour $tabDate[2]/$tabDate[1]/$tabDate[0], $forum[3]-$forum[4]";
							?>
						</h2>
				
						<p>
							<strong>Adresse :</strong> <?php echo "$forum[22], $forum[15] $forum[17]"; ?><br />
							<?php
								if ($forum[28] == F) {
									echo "<strong>Correspondante :</strong> Madame $forum[30] $forum[29], $forum[31], ";
								}
								else {
									echo "<strong>Correspondant :</strong> Monsieur $forum[30] $forum[29], $forum[31], ";
								}
						  echo "<a href='mailto:$forum[33]'>$forum[33]</a><br />
								<strong>Contact :</strong> $forum[34]";
							?>
						</p>
						<?php
							$commentaire = "?view=fiche_lycees&pre=fiche_lycees&id=" . $id;
							$mail = "?view=InfoInscrit" . $searchUser[8] . "&pre=fiche_lycees&id=" . $id;
   							$date = '20' . date('y/m/d');
							if (($searchUser[6] == "Student") && ($forum[10] == 0) && ($forum[9] != $searchUser[0]) && ($forum[2] > $date)){
                     	 		echo "<a href=$mail style='background-color:green'><br><span style='color:green'>_</span><span style='color:black'> S'inscrire </span><span style='color:green'>_</span><br><br></a>";
                     	 	}
						?>
						<div style='border: 1px solid lightgrey; width: 115px; margin-bottom: 20px;'>
							<p id='comment' style=' margin: 8px'>Commentaire...</p>
						</div>
						
						<div id='commentaires'>
							<img src='images/annuler.jpg' alt='Annuler' id='quitter' style='margin-left: 96%; margin-bottom: 20px; margin-top: 10px;'/>
							<?php
								echo "Commentaire (étudiants) : $forum[23] <br><br>";

								if ($searchUser[6] == "Admin"){
									echo " Commentaire (en problème) : $forum[24] <br><br> Commentaire (comptable) : $forum[25] <br><br> Commentaire (absences) : $forum[26] <br><br>";
								}

					  echo "<form method='post' action='$commentaire' style='margin: 0px 0px 15px 15px;'>
						        <div id='confirmation' style='color:Green;'></div>
						        <br><br>
								<textarea name='description' placeholder='Ajouter un commentaire' style='margin-bottom: 15px; width: 85%'></textarea><br>
								Pour ajouter à la suite <br>
								<input type='submit' name='etudiants' value='Valider étudiants' style='margin-right: 10px; background-color: lightblue;'>";
								if ($searchUser[6] == "Admin"){
						  echo "<input type='submit' name='probleme' value='Valider en problème' style='margin-right: 10px; background-color: red'>
								<input type='submit' name='comptable' value='Valider comptable' style='margin-right: 10px; background-color: green'>
								<input type='submit' name='absences' value='Valider absences' style='margin-right: 10px; background-color: green'>
								<br><br>
								Pour remplacer <br>
								<input type='submit' name='etudiants2' value='Valider étudiants' style='margin-right: 10px; background-color: lightblue;'>
								<input type='submit' name='probleme2' value='Valider en problème' style='margin-right: 10px; background-color: red'>
								<input type='submit' name='comptable2' value='Valider comptable' style='margin-right: 10px; background-color: green'>
								<input type='submit' name='absences2' value='Valider absences' style='margin-right: 10px; background-color: green'>";
								}
						  echo "<br><br>
								<input type='reset' name='reset' value='Annuler'>
							</form>";
							?>
						</div>
							
					</div>
				
					<div>
						<form>
							<select style='margin-bottom: 5px;'>
								<option>Courrier</option>
								<option>Mail</option>
								<option>Tel</option>
								<option>Courrier + Mail</option>
								<option>Eistien</option>
								<option>Autre</option>
							</select>
						
							<br />
						
							<select>
								<option>Lycée</option>
								<option>CPGE</option>
								<option>Lycée + CPGE</option>
								<option>DUT</option>
								<option>DUT GEII</option>
								<option>DUT MP</option>
								<option>DUT STID</option>
								<option>SUT RT</option>
								<option>Collège</option>
								<option>Collège + Lycée</option>
								<option>Autre</option>
							</select>
						</form>
					
						<p><?php echo "Prospection précédente : $forum[7]"; ?></p>
						<p>32 prospects R</p>
						<p>8$/prospect R</p>
						<p>Conf</p>
						<p>Que anciens</p>
					</div>
				</div>
				<a style='text-decoration: none; color: black' id='inscrits'>
					<?php
						if ($forum[10] != 0) {
		                	echo "2 inscrits :";
		                }
		                else {
		                	if ($forum[9] != 0) {
		                		echo "1 inscrit :";
		                	}
		                	else {
		                		echo "0 inscrit :";
		                	}
		                }
		            ?>
				<hr />
				</a>
				
				<div id='photos'>
					<!-- Afficher les participants -->
					<?php
						if ($forum[9] != 0){
							$participant1 = $pdo->query("SELECT * FROM utilisateurs, forum WHERE utilisateurs.id = Participant1 AND forum.Id = $id")->fetch(PDO::FETCH_BOTH);
							echo "$participant1[3] $participant1[4] <br> $participant1[5] <br> <img src=$participant1[7] height='100'> <br> <br>";
							if ($forum[10] != 0){
								$participant2 = $pdo->query("SELECT * FROM utilisateurs, forum WHERE utilisateurs.id = Participant2 AND forum.Id = $id")->fetch(PDO::FETCH_BOTH);
								echo "$participant2[3] $participant2[4] <br> $participant2[5] <br> <img src=$participant2[7] height='100'> <br> <br>";
							}
						}
					?>
				</div>

				<!-- Afficher les anciens ou parents proches -->
				<?php
					$nbAnciens = 0;
					$anciens = $pdo->query("SELECT * FROM utilisateurs, lycee, forum WHERE utilisateurs.Lycee = lycee.Id AND lycee.Id = forum.Lycee AND forum.Id = $id");

					if ($anciens == true){
						foreach ($anciens as $ancien) {
							$nbAnciens = $nbAnciens + 1;
						}
					}

					if ($nbAnciens > 1){
						echo "<a style='text-decoration: none; color: black' id='ancien'> $nbAnciens anciens ou parents proches : <hr /></a>";
					}
					else{
						echo "<a style='text-decoration: none; color: black' id='ancien'> $nbAnciens ancien ou parent proche : <hr /></a>";
					}

					echo "<div id='conteneur_un'>";

					$anciens = $pdo->query("SELECT * FROM utilisateurs, lycee, forum WHERE utilisateurs.Lycee = lycee.Id AND lycee.Id = forum.Lycee AND forum.Id = $id");

					if ($anciens == true){
						foreach ($anciens as $ancien) {
							echo "$ancien[3] $ancien[4] <br> $ancien[5] <br> <img src=$ancien[7] height='100'> <br> <br>";
						}
					}
				?>
				</div>

				<a style='text-decoration: none; color: black' id='reiteration'>0 l'an passé :
				<hr />
				</a>
				<div id='conteneur_deux'>
					<a href='#' style='color: black'>Inscrire <br> <br> </a>
				</div>

				<a style='text-decoration: none; color: black' id='annulation'>0 ayant annulé :
				<hr />
				</a>
				<div id='conteneur_trois'>
					<a href='#' style='color: black'>Inscrire <br> <br> </a>
				</div>

				<a style='text-decoration: none; color: black' id='rapport'>
					<?php
						if ($forum[11] != NULL) {
		                	echo "Un compte-rendu existant :";
		                }
		                else {
		                	echo "Pas de compte-rendu existant :";
		                }
		            ?>
				<hr />
				</a>
				<div id='conteneur_quatre'>
					<?php
						if ($forum[11] != NULL) {
		                	echo "$forum[11] <br>";
		                }
						else {
		                	echo "Pas de compte-rendu <br>";
		                }
		            ?>
					<a href='?view=compteRendu'> Cliquer ici pour visualiser le compte-rendu actuel </a>
				</div>
			</article>
		</section>
		
		<script src="JS/fiche_lycees.js"></script>
	</body>
</html>