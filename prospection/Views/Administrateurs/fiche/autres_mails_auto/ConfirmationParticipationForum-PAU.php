<?php
if(isset($_POST['mailform'])){


$header="MIME-Version: 1.0\r\n";
$header.='From:"Service Prospection EISTI"'."\n";
$header.='Content-Type:text/html; charset="uft-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';

$message="<html>
	<body>
		<div>
			Bonjour, <br/><br/>
			Vous pouvez compter sur la participation de l'EISTI à votre forum d'orientation.<br/>
			Voici la liste de nos élèves-ingénieurs volontaires : "mettre le prenom nom des eleves presents".<br/>
			Merci de bien vouloir les accueillir.<br/><br/>
			Demeurant à votre disposition, je vous prie d'agréer l'expression de mes salutations les plus dstinguées.<br/><br/>
			Cordialement, <br/><br/>
			Audrey PETITET<br/>
			Chargée de communication<br/>
			EISTI<br/>
			05 590 590 60
		</div>
	</body>
</html>
";

mail("charlesph.frantz@gmail.com", "Confirmation participation de l'EISTI à votre forum", $message, $header);
}
?>
<form method="POST" action="">
	<input type="submit" value="Recevoir un mail !" name="mailform"/>
</form>