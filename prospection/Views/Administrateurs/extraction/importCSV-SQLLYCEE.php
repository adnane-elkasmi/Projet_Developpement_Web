<?php
extract(filter_input_array(INPUT_POST));
$fichier = $_FILES["userfile"]["name"];
	if ($fichier){
		$fp = fopen($_FILES["userfile"]["tmp_name"], "r");
	}
	else {
		echo "Fichier inconnu";
	
?>
<p align="center">- Importation échouée -</p>
<p align="center"><B>Vous n'avez pas spécifié de chemin valide ...</B></p>

<?php exit(); }

$cpt = 0; ?>
<p align="center"> - Importation réussie -</p>
<?php
define("USERNAME", "root");
define("PASSWORD", "");
define("DSN", "mysql:host=localhost;dbname=test;charset=utf8");
while (!feof($fp)){
	$ligne = fgets($fp, 4096);
	$liste = explode(",", $ligne);
	$table = filter_input(INPUT_POST, 'userfile');
	$liste[0] = (isset($liste[0])) ? $liste[0] : Null;
	$liste[1] = (isset($liste[1])) ? $liste[1] : Null;
	$liste[2] = (isset($liste[2])) ? $liste[2] : Null;
	$liste[3] = (isset($liste[3])) ? $liste[3] : Null;
	$liste[4] = (isset($liste[4])) ? $liste[4] : Null;
	$liste[5] = (isset($liste[5])) ? $liste[5] : Null;
	$liste[6] = (isset($liste[6])) ? $liste[6] : Null;
	$liste[7] = (isset($liste[7])) ? $liste[7] : Null;
	$liste[8] = (isset($liste[8])) ? $liste[8] : Null;
	$liste[9] = (isset($liste[9])) ? $liste[9] : Null;
	$liste[10] = (isset($liste[10])) ? $liste[10] : Null;
	$liste[11] = (isset($liste[11])) ? $liste[11] : Null;
	$liste[12] = (isset($liste[12])) ? $liste[12] : Null;
	$liste[13] = (isset($liste[13])) ? $liste[13] : Null;
	
	$champ1 = $liste[0];
	$champ2 = $liste[1];
	$champ3 = $liste[2];
	$champ4 = $liste[3];
	$champ5 = $liste[4];
	$champ6 = $liste[5];
	$champ7 = $liste[6];
	$champ8 = $liste[7];
	$champ9 = $liste[8];
	$champ10 = $liste[9];
	$champ11 = $liste[10];
	$champ12 = $liste[11];
	$champ13 = $liste[12];
	$champ14 = $liste[13];
	
	if ($champ1 != ''){
		$cpt++;
		$db = new PDO(DSN,USERNAME,PASSWORD);
		$sql = ("INSERT INTO lycee(Type, Nom, Code_Postal, Departement, Ville, Proche_de, Standard, Fax, Mail_Lycee, AdressePostale Commentaire1, Commentaire2, Commentaire3, Commentaire4) VALUES('$champ1','$champ2','$champ3','$champ4','$champ5','$champ6','$champ7','$champ8','$champ9','$champ10','$champ11','$champ12','$champ13','$champ14')");
		$result = $db->query($sql)->fetch(PDO::FETCH_BOTH);
	}
}
fclose($fp);
						
// Pour reset l'auto increment de phpmyadmin dans la table lycee faire une requete dans SQL de phpmyadmin : ALTER TABLE lycee AUTO_INCREMENT=0;
?>
<h2>Nombre de valeurs nouvellement enregistrées : </h2><b><?php echo $cpt;?></b>
