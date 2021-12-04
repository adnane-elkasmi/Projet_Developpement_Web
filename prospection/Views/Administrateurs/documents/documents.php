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
		<title>Prospection EISTI</title>
	</head>

	<body style='margin-left:170px'>
		<!-- On s'occupe maintenant de la PAGE -->
		<section>
			<!-- Un bloc d'ajout de nouveaux documents -->
			<div style='display: flex; justify-content: space-between; margin-right: 15px; margin-bottom: 20px;'>
				<div>
					<a href="#" id="nouveau"><img src="images/plus2.png" alt="Ajouter un document"/>ajouter un document</a><br />
					
					<form action="?view=upload&pre=documents" method="POST" enctype="multipart/form-data" id="new_doc" style='margin-bottom: 30px'>
						<p>Ajouter un document :</p>
						<span id="choice">
							<label style='margin-bottom: 5px;'><input name="doc_C" class="doc" type="checkbox"/>A consulter</label>
							<label style='margin-bottom: 5px;'><input name="doc_T" class="doc" type="checkbox"/>A télécharger</label>
							<input type="reset" name="reset" value="Annuler" style='margin: 0px 0px 5px 10px;'/><br />
						</span>
						<span id="sheet">
							<input type="file" name="file" id="file" style='margin-bottom: 5px;'/> <br />
							<progress id="progress" style='margin-bottom: 5px;'></progress><br />
							<input type="submit" name="submit" value="Ajouter"/>
						</span>
					</form>
				</div>
			</div>	
			
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
							<form action="?view=deletefile&pre=documents" method="POST">
								<input type="hidden" name="hidden" value="uploads/both/<?php echo $files[$a]; ?>" />
								<input type="image" src="images/trash2.png" style='margin-right: 5px;'/>
								<a href="uploads/both/<?php echo $files[$a]; ?>" target='_bank' style='color:blue; text-decoration:none;'><?php echo $files[$a]; ?></a><br />
							</form>
						<?php
							}
						?>
						
						<?php
							// This will return all files in that folder
							$files = scandir("uploads/consulter");
							for ($a = 2; $a < count($files); $a++){
						?>
							<!-- Displaying file name !-->
							<form action="?view=deletefile&pre=documents" method="POST">
								<input type="hidden" name="hidden" value="uploads/consulter/<?php echo $files[$a]; ?>" />
								<input type="image" src="images/trash2.png" style='margin-right: 5px;'/>
								<a href="uploads/consulter/<?php echo $files[$a]; ?>" target="_bank" style='color:blue; text-decoration:none;'><?php echo $files[$a]; ?></a><br />
							</form>
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
							<form action="?view=deletefile&pre=documents" method="POST">
								<input type="hidden" name="hidden" value="uploads/both/<?php echo $files[$a]; ?>" />
								<input type="image" src="images/trash2.png" style='margin-right: 5px;'/>
								<a href="uploads/both/<?php echo $files[$a]; ?>" style='color:blue; text-decoration:none;' download><?php echo $files[$a]; ?></a><br />
							</form>
						<?php
							}
						?>
					
						<?php
							// This will return all files in that folder
							$files = scandir("uploads/telecharger");
							for ($a = 2; $a < count($files); $a++){
						?>
							<!-- Displaying file name !-->
							<form action="?view=deletefile&pre=documents" method="POST">
								<input type="hidden" name="hidden" value="uploads/telecharger/<?php echo $files[$a]; ?>" />
								<input type="image" src="images/trash2.png" style='margin-right: 5px;'/>
								<a href="uploads/telecharger/<?php echo $files[$a]; ?>" style='color:blue; text-decoration:none;' download><?php echo $files[$a]; ?></a><br />
							</form>
						<?php
							}
						?>
					</span>
				</fieldset>
			</form>
		</section>
		
		<script src="js/documents.js"></script>
	</body>
</html>