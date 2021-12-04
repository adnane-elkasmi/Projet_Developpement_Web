<?php
if(isset($_POST['mailform'])){


$header="MIME-Version: 1.0\r\n";
$header.='From:"Service Prospection EISTI"'."\n";
$header.='Content-Type:text/html; charset="uft-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';

$message="<html>
	<body>
		<div>
			Rappel :<br/><br/>
			Bonjour, <br/><br/>
			Vous vous êtes inscrit pour la prospection à "donner le nom de la ville" au "donner le nom du lycee" qui a lieu dans 5 jours.<br/><br/>
			Avez-vous été briefé et récupéré la documentation ?<br/><br/>
			Le service prospection<br/>
			EISTI<br/><br/>
			Pau
		</div>
	</body>
</html>
";

mail("charlesph.frantz@gmail.com", "Rappel forum service prospection", $message, $header);
}
?>
<form method="POST" action="">
	<input type="submit" value="Recevoir un mail !" name="mailform"/>
</form>