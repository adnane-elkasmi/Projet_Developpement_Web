<?php
    // Base de données
    try{
        $pdo = new PDO(DSN,USERNAME,PASSWORD);
    }
    catch (PDOException $e){
        die("Error ! : " . $e->getTraceAsString());
    }
    
    // Récupérer l'utilisateur
    $username = $_SESSION['username'];

    // Chercher les informations de l'utilisateur
    $searchUser = $pdo->query("SELECT * FROM utilisateurs WHERE Username='$username'")->fetch(PDO::FETCH_BOTH);

    // Récupérer le campus
    $campus = $searchUser[8];

    // Récupérer le filtre
    $filtre = isset($_GET["filtre"]) ? str_replace(" ", "", $_GET["filtre"]) : "" ;
    if ($filtre == "Tout"){
        $filtre = "";
    }

    // Récupérer l'ordre
    $ordre = isset($_GET["ordre"]) ? str_replace(" ", "", $_GET["ordre"]) : "" ;
    if ($ordre == "Du_plus_ancien_au_plus_récent"){
        $ordre = "";
    }

    // Récupérer la date actuelle
    $date = '20' . date('y/m/d');

    // Chercher les informations des prospections selon le campus, l'ordre, et le filtre
    if ($campus == ""){
    	if ($ordre == ""){
    		switch ($filtre){
                case "Aucune_place_libre":
                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant2 <> 0 ORDER BY DateForum");
                    break;
                case "Une_place_libre":
                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant1 <> 0 AND Participant2 = 0 ORDER BY DateForum");
                    break;
                case "Deux_places_libres":
                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant1 = 0 ORDER BY DateForum");
                    break;
                case "Lycée":
                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type = 'Lycée' ORDER BY DateForum");
                    break;
                case "IUT":
                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type = 'IUT' ORDER BY DateForum");
                    break;
                case "Forum":
                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Forum' ORDER BY DateForum");
                    break;
                case "Salon":
                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Salon' ORDER BY DateForum");
                    break;
                case "Conférence":
                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Conférence' ORDER BY DateForum");
                    break;
                case "A_venir":
                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND DateForum >= '$date' ORDER BY DateForum");
                    break;
                default:
                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id ORDER BY DateForum");
                    break;
            }
	    }
	    else{
		    if ($ordre == "Du_plus_récent_au_plus_ancien"){
	    		switch ($filtre){
	                case "Aucune_place_libre":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant2 <> 0 ORDER BY DateForum DESC");
	                    break;
	                case "Une_place_libre":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant1 <> 0 AND Participant2 = 0 ORDER BY DateForum DESC");
	                    break;
	                case "Deux_places_libres":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant1 = 0 ORDER BY DateForum DESC");
	                    break;
	                case "Lycée":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type = 'Lycée' ORDER BY DateForum DESC");
	                    break;
	                case "IUT":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type = 'IUT' ORDER BY DateForum DESC");
	                    break;
	                case "Forum":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Forum' ORDER BY DateForum DESC");
	                    break;
	                case "Salon":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Salon' ORDER BY DateForum DESC");
	                    break;
	                case "Conférence":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Conférence' ORDER BY DateForum DESC");
	                    break;
	                case "A_venir":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND DateForum >= '$date' ORDER BY DateForum DESC");
	                    break;
	                default:
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id ORDER BY DateForum DESC");
	                    break;
	            }
		    }
		    else{
		    	if ($ordre == "Code_postal_(ordre_croissant)") {
		    		switch ($filtre){
		                case "Aucune_place_libre":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant2 <> 0 ORDER BY Code_Postal, DateForum");
		                    break;
		                case "Une_place_libre":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant1 <> 0 AND Participant2 = 0 ORDER BY Code_Postal, DateForum");
		                    break;
		                case "Deux_places_libres":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant1 = 0 ORDER BY Code_Postal, DateForum");
		                    break;
		                case "Lycée":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type = 'Lycée' ORDER BY Code_Postal, DateForum");
		                    break;
		                case "IUT":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type = 'IUT' ORDER BY Code_Postal, DateForum");
		                    break;
		                case "Forum":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Forum' ORDER BY Code_Postal, DateForum");
		                    break;
		                case "Salon":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Salon' ORDER BY Code_Postal, DateForum");
		                    break;
		                case "Conférence":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Conférence' ORDER BY Code_Postal, DateForum");
		                    break;
		                case "A_venir":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND DateForum >= '$date' ORDER BY Code_Postal, DateForum");
		                    break;
		                default:
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id ORDER BY Code_Postal, DateForum");
		                    break;
		            }
		        }
		        else {
		    		switch ($filtre){
		                case "Aucune_place_libre":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant2 <> 0 ORDER BY Code_Postal DESC, DateForum");
		                    break;
		                case "Une_place_libre":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant1 <> 0 AND Participant2 = 0 ORDER BY Code_Postal DESC, DateForum");
		                    break;
		                case "Deux_places_libres":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant1 = 0 ORDER BY Code_Postal DESC, DateForum");
		                    break;
		                case "Lycée":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type = 'Lycée' ORDER BY Code_Postal DESC, DateForum");
		                    break;
		                case "IUT":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type = 'IUT' ORDER BY Code_Postal DESC, DateForum");
		                    break;
		                case "Forum":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Forum' ORDER BY Code_Postal DESC, DateForum");
		                    break;
		                case "Salon":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Salon' ORDER BY Code_Postal DESC, DateForum");
		                    break;
		                case "Conférence":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Conférence' ORDER BY Code_Postal DESC, DateForum");
		                    break;
		                case "A_venir":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND DateForum >= '$date' ORDER BY Code_Postal DESC, DateForum");
		                    break;
		                default:
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id ORDER BY Code_Postal DESC, DateForum");
		                    break;
		            }
		        }
		    }
		}
    }
    else{
        if ($campus == "Pau"){
        	if ($ordre == ""){
	    		switch ($filtre){
	                case "Aucune_place_libre":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant2 <> 0 AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum");
	                    break;
	                case "Une_place_libre":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant1 <> 0 AND Participant2 = 0 AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum");
	                    break;
	                case "Deux_places_libres":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant1 = 0 AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum");
	                    break;
	                case "Lycée":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type = 'Lycée' AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum");
	                    break;
	                case "IUT":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type = 'IUT' AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum");
	                    break;
	                case "Forum":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Forum'  AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum");
	                    break;
	                case "Salon":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Salon'  AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum");
	                    break;
	                case "Conférence":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Conférence'  AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum");
	                    break;
	                case "A_venir":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND DateForum >= '$date' AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum");
	                    break;
	                default:
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum");
	                    break;
	            }
       		}
       		else{
			    if ($ordre == "Du_plus_récent_au_plus_ancien"){
		    		switch ($filtre){
		                case "Aucune_place_libre":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant2 <> 0 AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum DESC");
		                    break;
		                case "Une_place_libre":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant1 <> 0 AND Participant2 = 0 AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum DESC");
		                    break;
		                case "Deux_places_libres":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant1 = 0 AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum DESC");
		                    break;
		                case "Lycée":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type = 'Lycée' AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum DESC");
		                    break;
		                case "IUT":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type = 'IUT' AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum DESC");
		                    break;
		                case "Forum":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Forum'  AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum DESC");
		                    break;
		                case "Salon":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Salon'  AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum DESC");
		                    break;
		                case "Conférence":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Conférence'  AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum DESC");
		                    break;
		                case "A_venir":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND DateForum >= '$date' AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum DESC");
		                    break;
		                default:
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum DESC");
		                    break;
		            }
				}
				else{
			    	if ($ordre == "Code_postal_(ordre_croissant)") {
			    		switch ($filtre){
			                case "Aucune_place_libre":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant2 <> 0 AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal, DateForum");
			                    break;
			                case "Une_place_libre":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant1 <> 0 AND Participant2 = 0 AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal, DateForum");
			                    break;
			                case "Deux_places_libres":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant1 = 0 AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal, DateForum");
			                    break;
			                case "Lycée":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type = 'Lycée' AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal, DateForum");
			                    break;
			                case "IUT":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type = 'IUT' AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal, DateForum");
			                    break;
			                case "Forum":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Forum'  AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal, DateForum");
			                    break;
			                case "Salon":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Salon'  AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal, DateForum");
			                    break;
			                case "Conférence":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Conférence'  AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal, DateForum");
			                    break;
			                case "A_venir":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND DateForum >= '$date' AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal, DateForum");
			                    break;
			                default:
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal, DateForum");
			                    break;
			            }
					}
					else {
			    		switch ($filtre){
			                case "Aucune_place_libre":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant2 <> 0 AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC, DateForum");
			                    break;
			                case "Une_place_libre":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant1 <> 0 AND Participant2 = 0 AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC, DateForum");
			                    break;
			                case "Deux_places_libres":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant1 = 0 AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC, DateForum");
			                    break;
			                case "Lycée":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type = 'Lycée' AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC, DateForum");
			                    break;
			                case "IUT":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type = 'IUT' AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC, DateForum");
			                    break;
			                case "Forum":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Forum'  AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC, DateForum");
			                    break;
			                case "Salon":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Salon'  AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC, DateForum");
			                    break;
			                case "Conférence":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Conférence'  AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC, DateForum");
			                    break;
			                case "A_venir":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND DateForum >= '$date' AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC, DateForum");
			                    break;
			                default:
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC, DateForum");
			                    break;
			            }
					}
				}
       		}
       	}
        else{
        	if ($ordre == ""){
	    		switch ($filtre){
	                case "Aucune_place_libre":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant2 <> 0 AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum");
	                    break;
	                case "Une_place_libre":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant1 <> 0 AND Participant2 = 0 AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum");
	                    break;
	                case "Deux_places_libres":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant1 = 0 AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum");
	                    break;
	                case "Lycée":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type = 'Lycée' AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum");
	                    break;
	                case "IUT":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type = 'IUT' AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum");
	                    break;
	                case "Forum":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Forum'  AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum");
	                    break;
	                case "Salon":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Salon'  AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum");
	                    break;
	                case "Conférence":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Conférence'  AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum");
	                    break;
	                case "A_venir":
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND DateForum >= '$date' AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum");
	                    break;
	                default:
	                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum");
	                    break;
	            }
			}
			else{
			    if ($ordre == "Du_plus_récent_au_plus_ancien"){
		    		switch ($filtre){
		                case "Aucune_place_libre":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant2 <> 0 AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum DESC");
		                    break;
		                case "Une_place_libre":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant1 <> 0 AND Participant2 = 0 AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum DESC");
		                    break;
		                case "Deux_places_libres":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant1 = 0 AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum DESC");
		                    break;
		                case "Lycée":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type = 'Lycée' AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum DESC");
		                    break;
		                case "IUT":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type = 'IUT' AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum DESC");
		                    break;
		                case "Forum":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Forum'  AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum DESC");
		                    break;
		                case "Salon":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Salon'  AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum DESC");
		                    break;
		                case "Conférence":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Conférence'  AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum DESC");
		                    break;
		                case "A_venir":
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND DateForum >= '$date' AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum DESC");
		                    break;
		                default:
		                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum DESC");
		                    break;
		            }
				}
				else{
			    	if ($ordre == "Code_postal_(ordre_croissant)") {
			    		switch ($filtre){
			                case "Aucune_place_libre":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant2 <> 0 AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal, DateForum");
			                    break;
			                case "Une_place_libre":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant1 <> 0 AND Participant2 = 0 AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal, DateForum");
			                    break;
			                case "Deux_places_libres":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant1 = 0 AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal, DateForum");
			                    break;
			                case "Lycée":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type = 'Lycée' AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal, DateForum");
			                    break;
			                case "IUT":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type = 'IUT' AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal, DateForum");
			                    break;
			                case "Forum":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Forum'  AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal, DateForum");
			                    break;
			                case "Salon":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Salon'  AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal, DateForum");
			                    break;
			                case "Conférence":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Conférence'  AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal, DateForum");
			                    break;
			                case "A_venir":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND DateForum >= '$date' AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal, DateForum");
			                    break;
			                default:
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal, DateForum");
			                    break;
			            }
					}
					else {
			    		switch ($filtre){
			                case "Aucune_place_libre":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant2 <> 0 AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC, DateForum");
			                    break;
			                case "Une_place_libre":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant1 <> 0 AND Participant2 = 0 AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC, DateForum");
			                    break;
			                case "Deux_places_libres":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Participant1 = 0 AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC, DateForum");
			                    break;
			                case "Lycée":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type = 'Lycée' AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC, DateForum");
			                    break;
			                case "IUT":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type = 'IUT' AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC, DateForum");
			                    break;
			                case "Forum":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Forum'  AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC, DateForum");
			                    break;
			                case "Salon":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Salon'  AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC, DateForum");
			                    break;
			                case "Conférence":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Type_de_prospection = 'Conférence'  AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC, DateForum");
			                    break;
			                case "A_venir":
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND DateForum >= '$date' AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC DESC, DateForum");
			                    break;
			                default:
			                    $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY Code_Postal DESC, DateForum");
			                    break;
			            }
					}
				}
			}
        }
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> Prospection EISTI </title>
	</head>

	<body style='margin-left:170px'>
		<!-- On s'occupe maintenant de la PAGE -->
		<section>
			<!-- La navigation au sein de la page Etablissements (Prospection, En attente, Pas de forum) -->
			<h2 style='text-align: center; margin-bottom: 0px; margin-top: 0px; background-color: #F2F2F2;'>Bienvenue <?php echo "$searchUser[3] $searchUser[4]"; ?></h2>
			<nav id="navigation_etablissements" style='background-color: #F2F2F2;'>
				<a href="?view=accueil_eleves&pre=accueil_eleves" style='color:black; text-decoration:none;' id="prospection1"><div><strong>PROSPECTION</strong></div></a>
				<a href="?view=attente_eleves&pre=accueil_eleves" style='color:black; text-decoration:none;' id="attente1"><div><strong>EN ATTENTE</strong></div></a>
				<a href="?view=noForum_eleves&pre=accueil_eleves" style='color:black; text-decoration:none;' id="noForum1"><div><strong>PAS DE FORUM</strong></div></a>
			</nav>
			
			<?php
                echo "<ul class='search'>
						<li><p> Campus : $searchUser[8] </p></li>
						<li>
						</li>
						<li><p> Filtre </p></li>
						<li>
							<select id='filtre' size='1'>
								<option>Tout</option>
								<option>Samedi</option>
								<option>Aucune_place_libre</option>
								<option>Une_place_libre</option>
								<option>Deux_places_libres</option>
								<option>Lycée</option>
								<option>IUT</option>
								<option>Forum</option>
								<option>Salon</option>
								<option>Conférence</option>
								<option>A_venir</option>
							</select>
						</li>
						<li><p> Ordre </p></li>
						<li>
							<select id='ordre' size='1'>
								<option>Du_plus_ancien_au_plus_récent</option>
								<option>Du_plus_récent_au_plus_ancien</option>
								<option>Code_postal_(ordre_croissant)</option>
								<option>Code_postal_(ordre_décroissant)</option>
							</select>
						</li>
						<li><input id='searchCampus' type='image' src='Pictures/Site/research.png' alt='loupe' width='24'></li>
					  </ul>";

			    echo "<script type='text/javascript'>
                        $(function() {
                            $('#searchCampus').click(function() {
                                filtreChoice = $('#filtre option:selected').text();
                                ordreChoice = $('#ordre option:selected').text();
                                window.location.href ='?view=accueil_eleves&pre=accueil_eleves&filtre=' + filtreChoice + '&ordre=' + ordreChoice;
                            });
                        });
                      </script>";
			?>

			<!-- On insère le tableau des établissements -->
			<table>
				<tr style='background-color: #e1e4eb;'>
					<th>Jour</th>
					<th>Date</th>
					<th>Horaires</th>
					<th>Type de prospection</th>
					<th>Type d'établissement</th>
					<th>Nom de l'établissement</th>
					<th>Code postal</th>
					<th>Ville</th>
					<th>Proche de</th>
					<th>Nombre de places libres</th>
				</tr>
				
				<?php
					foreach ($forums as $forum){
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

		                if ((($filtre == "Samedi") && ($jour == "Samedi")) || ($filtre != "Samedi")) {
			                if ($forum[9] == 0) {
			                	$places = 2;
								echo "<tr style='background-color: red;'>";
			                }
			                else {
			                	if ($forum[10] == 0) {
			                		$places = 1;
									echo "<tr>";
			                	}
			                	else {
			                		$places = 0;
									echo "<tr style='background-color: yellow;'>";
			                	}
			                }
									
						  echo "<td><a href='?view=fiche_lycees&pre=accueil_eleves&id=$forum[0]'>$jour</a></td>
								<td><a href='?view=fiche_lycees&pre=accueil_eleves&id=$forum[0]'>$tabDate[2]/$tabDate[1]/$tabDate[0]</a></td>
								<td><a href='?view=fiche_lycees&pre=accueil_eleves&id=$forum[0]'>$forum[3]-$forum[4]</a></td>
								<td><a href='?view=fiche_lycees&pre=accueil_eleves&id=$forum[0]'>$forum[8]</a></td>
								<td><a href='?view=fiche_lycees&pre=accueil_eleves&id=$forum[0]'>$forum[13]</a></td>
								<td><a href='?view=fiche_lycees&pre=accueil_eleves&id=$forum[0]'>$forum[14]</a></td>
								<td><a href='?view=fiche_lycees&pre=accueil_eleves&id=$forum[0]'>$forum[15]</a></td>
								<td><a href='?view=fiche_lycees&pre=accueil_eleves&id=$forum[0]'>$forum[17]</a></td>
								<td><a href='?view=fiche_lycees&pre=accueil_eleves&id=$forum[0]'>$forum[18]</a></td>
								<td><a href='?view=fiche_lycees&pre=accueil_eleves&id=$forum[0]'>$places</a></td>
							</tr>";
						}
					}
				?>
			</table>
		</section>
	</body>
</html>