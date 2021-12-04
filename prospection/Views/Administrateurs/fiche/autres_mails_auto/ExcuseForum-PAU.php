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
			Je suis au regret de vous annoncer que nous n'avons aucun volontaire pour nous représenter lors de votre forum. Nous vous prions de bien vouloir nous excuser et espérons vivement pouvoir participer à votre forum l'an prochain. <br/><br/>
			Consciente que cela ne remplacera notre intervention, puis-je tout de même vous envoyer quelques plaquettes de notre établissement à destination de vos élèves des fillières scientifiques ? <br/> <br/>
			Cordialement, <br/><br/>
			Audrey PETITET<br/>
			Chargée de communication<br/>
			EISTI<br/>
			05 590 590 60
		</div>
	</body>
</html>
";

mail("charlesph.frantz@gmail.com", "A propos de notre participation à votre forum", $message, $header);
}
?>
<form method="POST" action="">
	<input type="submit" value="Recevoir un mail !" name="mailform"/>
</form>