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
			Merci de passer faire votre compte-rendu de prospection au service prospection. Tant que ce compte-rendu n'a pas été effectué, la prospection n'est pas prise en compte.<br/> <br/>
			Cordialement, <br/><br/>

			Le service prospection<br/>
			EISTI<br/>
			Cergy CT 309
		</div>
	</body>
</html>
";

mail("charlesph.frantz@gmail.com", "Rappel Compte-Rendu prospection", $message, $header);
}
?>
<form method="POST" action="">
	<input type="submit" value="Recevoir un mail !" name="mailform"/>
</form>