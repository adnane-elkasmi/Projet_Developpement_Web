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
			<!-- Créer une liste des documents, certains à télécharger et d'autres non -->	
			<form>
				<fieldset style='margin-bottom: 15px'>
					<legend>A consulter</legend>
					<span id="consulter">
						<?php
							// This will return all files in that folder
							$files = scandir("uploads/both");
							for ($a = 2; $a < count($files); $a++){
						?>
							<!-- Displaying file name !-->
							<a href="uploads/both/<?php echo $files[$a]; ?>" target="_bank" style='color:blue; text-decoration:none;'><?php echo $files[$a]; ?></a><br />
						<?php
							}
						?>
						
						<?php
							// This will return all files in that folder
							$files = scandir("uploads/consulter");
							for ($a = 2; $a < count($files); $a++){
						?>
							<!-- Displaying file name !-->
							<a href="uploads/consulter/<?php echo $files[$a]; ?>" target="_bank" style='color:blue; text-decoration:none;'><?php echo $files[$a]; ?></a><br />
						<?php
							}
						?>
					</span>
				</fieldset>
				<fieldset>
					<legend>A télécharger</legend>
					<span id="telecharger">
						<?php
							// This will return all files in that folder
							$files = scandir("uploads/both");
							for ($a = 2; $a < count($files); $a++){
						?>
							<!-- Displaying file name !-->
							<a href="uploads/both/<?php echo $files[$a]; ?>" style='color:blue; text-decoration:none;' download><?php echo $files[$a]; ?></a><br />
						<?php
							}
						?>
					
						<?php
							// This will return all files in that folder
							$files = scandir("uploads/telecharger");
							for ($a = 2; $a < count($files); $a++){
						?>
							<!-- Displaying file name !-->
							<a href="uploads/telecharger/<?php echo $files[$a]; ?>" style='color:blue; text-decoration:none;' download><?php echo $files[$a]; ?></a><br />
						<?php
							}
						?>
					</span>
				</fieldset>
			</form>
		</section>
	</body>
</html>