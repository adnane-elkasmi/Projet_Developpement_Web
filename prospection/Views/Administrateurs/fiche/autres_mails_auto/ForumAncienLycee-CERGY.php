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
			Votre ancien établissement "donner le nom du lycee" nous invite a un forum le "donner la date" de "donner horaire". Merci de nous dire dans la semaine si vous souhaitez y aller. Sans réponse de votre part, nous proposerons la prospection aux autres eistiens et vous ne serez plus prioritaires.<br/> <br/>
			Cordialement, <br/><br/>
			Le service prospection<br/>
			EISTI<br/>
			Cergy CT 309
		</div>
	</body>
</html>
";

mail("charlesph.frantz@gmail.com", "Un forum de votre ancien lycée est disponible !", $message, $header);
}
?>
<form method="POST" action="">
	<input type="submit" value="Recevoir un mail !" name="mailform"/>
</form>