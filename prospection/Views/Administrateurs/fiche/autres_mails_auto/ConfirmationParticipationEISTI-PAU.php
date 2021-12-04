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
			Nous avons bien noté votre forum du "donner la date" et serons ravis d'y participer.<br/> <br/>
			Nous vous communiquerons les noms des élèves-ingénieurs volontaires qui nous représenterons dès que nous en prendrons connaissance.<br/><br/>
			Demeurant à votre disposition, je vous prie d'agréer l'expression de mes salutations les plus distinguées.<br/><br/>
			Cordialement, <br/><br/>
			Audrey PETITET<br/>
			Chargée de communication<br/>
			EISTI<br/>
			05 590 590 60
		</div>
	</body>
</html>
";

mail("charlesph.frantz@gmail.com", "Confirmation participation de l'EISTI au forum de vote établissement", $message, $header);
}
?>
<form method="POST" action="">
	<input type="submit" value="Recevoir un mail !" name="mailform"/>
</form>