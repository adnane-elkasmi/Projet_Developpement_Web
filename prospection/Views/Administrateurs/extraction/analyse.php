<?php
    // Base de données
    try{
        $pdo = new PDO(DSN,USERNAME,PASSWORD);
    }
    catch (PDOException $e){
        die("Error ! : " . $e->getTraceAsString());
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
			<!-- La navigation au sein de la page Extraction (Exporter, Importer) -->
			<h2 style='margin-bottom: 0px; margin-top: 0px; background-color: #F2F2F2;'></h2>
			<nav id="navigation_extraction" style='background-color: #F2F2F2; height: 80px'>
				<a href="?view=extraction&pre=analyse" style='color:black; text-decoration:none;' id="fichier2"><div><strong>EXPORTER</strong></div></a>
				<a href="?view=analyse&pre=analyse" style='color:black; text-decoration:none;' id="analyse2"><div><strong>IMPORTER</strong></div></a>
			</nav>
		</section>
	</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
		<meta charset="utf-8">
		<title>Avancement</title>
	</head>
	<body>
		<h3>Veuillez choisir un fichier *.csv à ajouter dans la table forum de la base sql : </h3>
		<form method="post" enctype="multipart/form-data" action="Views/Administrateurs/extraction/importCSV-SQLFORUM.php" target="_BLANK">
			<input name="userfile" type="file" value="table"/>
			<input name="submit" type="submit" value="Importer"/>
		</form>
	</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
		<meta charset="utf-8">
		<title>Avancement</title>
	</head>
	<body>
		<h3>Veuillez choisir un fichier *.csv à ajouter dans la table lycee de la base sql : </h3>
		<form method="post" enctype="multipart/form-data" action="Views/Administrateurs/extraction/importCSV-SQLLYCEE.php" target="_BLANK">
			<input name="userfile" type="file" value="table"/>
			<input name="submit" type="submit" value="Importer"/>
		</form>
	</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
		<meta charset="utf-8">
		<title>Avancement</title>
	</head>
	<body>
		<h3>Veuillez choisir un fichier *.csv à ajouter dans la table contactlycee de la base sql : </h3>
		<form method="post" enctype="multipart/form-data" action="Views/Administrateurs/extraction/importCSV-SQLCONTACTLYCEE.php" target="_BLANK">
			<input name="userfile" type="file" value="table"/>
			<input name="submit" type="submit" value="Importer"/>
		</form>
	</body>
</html>
