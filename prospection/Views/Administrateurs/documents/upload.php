<?php
	if (isset($_POST['submit'])){
		$choix_1 = $_POST['doc_C'];
		$choix_2 = $_POST['doc_T'];
		$file = $_FILES['file'];
		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];
		$fileType = $_FILES['file']['type'];
		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpg', 'jpeg', 'png', 'pdf', 'docx', 'xlsx', 'doc', 'pptx', 'mp4', 'mp3', 'php', 'html', 'css', 'sql', 'js', 'c');
		if (in_array($fileActualExt, $allowed)){
			if ($fileError === 0){
				if ($fileSize < 5000000){
					$fileNameNew = uniqid('', true).".".$fileActualExt;
					if (($choix_1 == $choix_2)){
						$fileDestination = 'uploads/both/'.$fileName;
						move_uploaded_file($fileTmpName, $fileDestination);
					}
					elseif ($choix_1 == 'on'){
						$fileDestination = 'uploads/consulter/'.$fileName;
						move_uploaded_file($fileTmpName, $fileDestination);
					}
					else {
						$fileDestination = 'uploads/telecharger/'.$fileName;
						move_uploaded_file($fileTmpName, $fileDestination);
					}
					header("Location:?view=documents");
				}
				else {
					echo "<script>
							alert('Votre fichier est trop volumineux !')
						</script>";	
				}
			}
			else {
				echo "<script>
						alert('Il y a eu une erreur pendant l'upload du fichier.')
					</script>";
			}
		}
		else {
			echo "<script>
					alert('Vous ne pouvez pas upload ce fichier.')
					javascript:history.go(-1)
				</script>";
		}
	}
?>