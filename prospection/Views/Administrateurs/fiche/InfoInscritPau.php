<?php
    // Récupérer l'id de la prospection
    $id = isset($_GET["id"]) ? $_GET["id"] : "" ;

    // Base de données
    try{
        $pdo = new PDO(DSN,USERNAME,PASSWORD);
    }
    catch (PDOException $e){
        die("Error ! : " . $e->getTraceAsString());
    }

    // Chercher les informations de la prospection
    $forum = $pdo->query("SELECT * FROM forum, lycee, contactlycee WHERE Lycee = lycee.Id AND Lycee = Idlycee AND forum.Id = $id")->fetch(PDO::FETCH_BOTH);

    // Récupérer l'utilisateur
    $username = $_SESSION['username'];

    // Chercher les informations de l'utilisateur
    $searchUser = $pdo->query("SELECT * FROM utilisateurs WHERE Username='$username'")->fetch(PDO::FETCH_BOTH);

    // Mettre à jour les participants de la prospection
    if ($forum[9] == 0){
        try{
			$pdo->exec("UPDATE forum SET Participant1 = '$searchUser[0]' WHERE Id = $id");
        }
        catch (PDOException $e){
            die("Error ! : " . $e->getTraceAsString());
        }
    }
    else{
        try{
			$pdo->exec("UPDATE forum SET Participant2 = '$searchUser[0]' WHERE Id = $id");
        }
        catch (PDOException $e){
            die("Error ! : " . $e->getTraceAsString());
        }
    }

	echo "<span style='margin-left : 170px'>Votre inscription a bien été confirmée, vous avez reçu un mail.</span>";
	$tabDate = explode('/', $forum[2]);
	$timestamp = mktime(0, 0, 0, $tabDate[1], $tabDate[2], $tabDate[0]);
	$jour = date('D', $timestamp);
	switch ($jour){
	    case "Mon":
	        $jour = "Lundi";
	        break;
	    case "Tue":
	        $jour = "Mardi";
	        break;
	    case "Wed":
	        $jour = "Mercredi";
	        break;
	    case "Thu":
	        $jour = "Jeudi";
	        break;
	    case "Fri":
	        $jour = "Vendredi";
	        break;
	    case "Sat":
	        $jour = "Samedi";
	        break;
	    case "Sun":
	        $jour = "Dimanche";
	        break;
	        
	}

	$header="MIME-Version: 1.0\r\n";
	$header.='From:"Service Prospection EISTI"'."\n";
	$header.='Content-Type:text/html; charset="uft-8"'."\n";
	$header.='Content-Transfer-Encoding: 8bit';

	$message="<html>
		<body>
			<div>
				Bonjour " . $searchUser[3] . " " . $searchUser[4] . ", <br/><br/>
				Nous confirmons votre inscription : " . $forum[8] . " au " . $forum[13] . " " . $forum[14] . " le " . $jour ." " . $tabDate[2] . "/" . $tabDate[1] ."/" . $tabDate[0] . ", " . $forum[3] . "-" . $forum[4] . ", à l'adresse " . $forum[22] . ", " . $forum[15] . " " . $forum[17] . ". 
				Vous trouverez toute la procédure dans la partie documents du site.<br/> <br/>
				Cordialement, <br/><br/>

				Le service prospection<br/>
				EISTI<br/>
				Pau
			</div>
		</body>
	</html>
	";

	mail($searchUser[5], "Confirmation de votre inscription au forum", $message, $header);
?>