<?php
    ob_start();
    error_reporting(0);

	// Open database connection
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DSN", "mysql:host=localhost;dbname=test;charset=utf8");

    // Controller
    require_once "Controllers/HomeController.php";
    $controller = new HomeController();

    // Base de données
    try{
        $pdo = new PDO(DSN,USERNAME,PASSWORD);
    }
    catch (PDOException $e){
        die("Error ! : " . $e->getTraceAsString());
    }

    // Récupérer le campus
    $campus = isset($_GET["campus"]) ? str_replace(" ", "", $_GET["campus"]) : "" ;
    if ($campus == "Tout"){
        $campus = "";
    }

    // Chercher les informations des prospections selon le campus
    if ($campus == ""){
        $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id ORDER BY DateForum");
    }
    else{
        if ($campus == "Pau"){
            $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Departement IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum");
        }
        else{
            $forums = $pdo->query("SELECT * FROM forum, lycee WHERE Lycee = lycee.Id AND Departement NOT IN (09, 11, 16, 17, 24, 31, 32, 33, 34, 40, 46, 47, 64, 65, 66, 81, 82) ORDER BY DateForum");
        }
    }

    // Récupérer d'autres informations
    $view = isset($_GET["view"]) ? $_GET["view"] : "home" ;
    $pre = isset($_GET["pre"]) ? $_GET["pre"] : "home" ;
    $session = isset($_GET["session"]) ? $_GET["session"] : "" ;
    $id = isset($_GET["id"]) ? $_GET["id"] : "" ;

    // Session
    session_start();
    if (isset($_SESSION['username'])){
        $session = $_SESSION['username'];
    }
    if (!isset($_SESSION['cart'])){
        $cart = array();
        $_SESSION['cart'] = $cart;
    }
    
    // Récupérer l'utilisateur
    $username = $_SESSION['username'];

    // Chercher les informations de l'utilisateur
    $searchUser = $pdo->query("SELECT * FROM utilisateurs WHERE Username='$username'")->fetch(PDO::FETCH_BOTH);
?>
		
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title> Prospection EISTI </title>
        <link rel="icon" href="Pictures/Site/EISTI.svg"/>
        <link rel="stylesheet" type="text/css" href="CSS/index.css" media="all"/>
        <?php
            if ($view == "home"){
                echo "<link rel='stylesheet' type='text/css' href='CSS/home.css' media='all'/>";
            }
        ?>
        <link rel="stylesheet" type="text/css" href="CSS/account.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="CSS/actualite.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="CSS/cart.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="CSS/cgv.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="CSS/concept.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="CSS/contact.css" media="all"/>
        <!-- <link rel="stylesheet" type="text/css" href="CSS/form.css" media="all"/> -->
        <link rel="stylesheet" type="text/css" href="CSS/glasses.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="CSS/personnalisation.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="CSS/police.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="CSS/product.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="CSS/protection.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="CSS/style_accueil_admin.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="CSS/style_analyse.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="CSS/style_attente.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="CSS/style_attente_eleves.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="CSS/style_compte_rendu.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="CSS/style_extraction.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="CSS/style_fiche_lycees.css" media="all"/>
        <!-- <link rel="stylesheet" type="text/css" href="CSS/style_login.css" media="all"/> -->
        <!-- <link rel="stylesheet" type="text/css" href="CSS/style_navigation_principale.css" media="all"/> -->
        <link rel="stylesheet" type="text/css" href="CSS/style_noForum.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="CSS/compteRendu.css" media="all"/>
    </head>
        
		<link rel="stylesheet" href="css/flexboxgrid.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
            
        <script type="text/javascript" src="JS/jquery-3.2.1.js"></script>
    </head>
    <body>
		<!-- Side navigation -->
		<?php
            if ($view != "login" && $view != "home"){
				// Sidebar pour les étudiants
				if ($searchUser[6] == "Student"){
					echo "<div class='sidenav'>";
                    $annuler = "?view=" . $view . "&pre=" . $view;
                    $logout = "?view=logout&pre=" . $view;
                    $accueil = "?view=accueil_eleves&pre=" . $view;
                    $prospections = "?view=mes_prospections&pre=" . $view;
                    $documents = "?view=documents_eleves&pre=" . $view;

                    if ($pre != "login"){
                      echo "<a href='https://eisti.fr' target='_blank'><img src='https://i.ibb.co/nw7KL79/Untitled-1.png' height='70'></a>
                            <a href=$accueil><img src='Pictures/Site/pros.png' height='24'></a>
                            <span style='color: black;'>__</span><span style='color: #CDFAFF;'>___________________</span>
                      <a href='javascript:history.go(-1)'><br><img src='Pictures/Site/annuler.png' alt='Retour' height='15'> RETOUR <br><br></a>";
                    }
                    else{
                      echo "<a href='https://eisti.fr' target='_blank'><img src='https://i.ibb.co/nw7KL79/Untitled-1.png' height='70'></a>
                            <a href=$accueil><img src='Pictures/Site/pros.png' height='24'></a>
                            <span style='color: black;'>__</span><span style='color: #CDFAFF;'>___________________</span>
                      <a href='?view=login&pre=login'><br><img src='Pictures/Site/annuler.png' alt='Retour' height='15'> RETOUR <br><br></a>";
                    }

                      echo "<a href=$annuler><br><img src='Pictures/Site/cancel.png' alt='Annuler' height='15'> ANNULER <br><br></a>
                      		<a href=$logout><br><img src='Pictures/Site/logout.png' alt='Déconnexion' height='19'> DECONNEXION <br><br></a>
                            <span style='color: black;'>__</span><span style='color: #CDFAFF;'>___________________</span>
                            <a href=$accueil><br><img src='Pictures/Site/eta.png' alt='Etablissements' height='19'> ETABLISSEMENTS <br><br></a>
                            <a href=$prospections><br><img src='Pictures/Site/register2.png' alt='Prospections' height='19'> MES PROSPECTIONS <br><br></a>
                            <a href=$documents><br><img src='Pictures/Site/doc.png' alt='Documents' height='19'> DOCUMENTS <br><br></a>
						  </div>";
				}
				// Sidebar pour les admins
				else {
					echo "<div class='sidenav'>";
                    $annuler = "?view=" . $view . "&pre=" . $view;
                    $logout = "?view=logout&pre=" . $view;
                    $accueil = "?view=accueil_admin&pre=" . $view;
                    $gestion = "?view=gestion&pre=" . $view;
                    $extraction = "?view=extraction&pre=" . $view;
                    $documents = "?view=documents&pre=" . $view;

                    if ($pre != "login"){
                      echo "<a href='https://eisti.fr' target='_blank'><img src='https://i.ibb.co/nw7KL79/Untitled-1.png' height='70'></a>
                            <a href=$accueil><img src='Pictures/Site/pros.png' height='24'></a>
                            <span style='color: black;'>__</span><span style='color: #CDFAFF;'>___________________</span>
                      <a href='javascript:history.go(-1)'><br><img src='Pictures/Site/annuler.png' alt='Retour' height='15'> RETOUR <br><br></a>";
                    }
                    else{
                      echo "<a href='https://eisti.fr' target='_blank'><img src='https://i.ibb.co/nw7KL79/Untitled-1.png' height='70'></a>
                            <a href=$accueil><img src='Pictures/Site/pros.png' height='24'></a>
                            <span style='color: black;'>__</span><span style='color: #CDFAFF;'>___________________</span>
                      <a href='?view=login&pre=login'><br><img src='Pictures/Site/annuler.png' alt='Retour' height='15'> RETOUR <br><br></a>";
                    }

                      echo "<a href=$annuler><br><img src='Pictures/Site/cancel.png' alt='Annuler' height='15'> ANNULER <br><br></a>
                      		<a href=$logout><br><img src='Pictures/Site/logout.png' alt='Déconnexion' height='19'> DECONNEXION <br><br></a>
                            <span style='color: black;'>__</span><span style='color: #CDFAFF;'>___________________</span>
                            <a href=$accueil><br><img src='Pictures/Site/eta.png' alt='Etablissements' height='19'> ETABLISSEMENTS <br><br></a>
                            <a href=$gestion><br><img src='Pictures/Site/register2.png' alt='Gestion' height='19'> GESTION <br><br></a>
                            <a href=$extraction><br><img src='Pictures/Site/Search.png' alt='Extraction' height='19'> EXTRACTION <br><br></a>
                            <a href=$documents><br><img src='Pictures/Site/doc.png' alt='Documents' height='19'> DOCUMENTS <br><br></a>
						  </div>";
				}
			}
		?>

		<!-- Page content -->
        <section>
            <?php
                switch ($view){
                    case "home":
                        $controller->home();
                        break;
                    case "login":
                        $controller->login();
                        break;
                    case "logout":
                        $controller->logout();
                        break;
                    case "accueil_admin":
                        $controller->accueil_admin();
                        break;
                    case "accueil_eleves":
                        $controller->accueil_eleves();
                        break;
                    case "analyse":
                        $controller->analyse();
                        break;
                    case "attente":
                        $controller->attente();
                        break;
                    case "attente_eleves":
                        $controller->attente_eleves();
                        break;
                    case "compteRendu":
                        $controller->compteRendu();
                        break;
                    case "compte_rendu":
                        $controller->compte_rendu();
                        break;
                    case "deletefile":
                        $controller->deletefile();
                        break;
                    case "documents":
                        $controller->documents();
                        break;
                    case "documents_eleves":
                        $controller->documents_eleves();
                        break;
                    case "extraction":
                        $controller->extraction();
                        break;
                    case "fiche_lycees":
                        $controller->fiche_lycees();
                        break;
                    case "gestion":
                        $controller->gestion();
                        break;
                    case "InfoInscritCergy":
                        $controller->InfoInscritCergy();
                        break;
                    case "InfoInscritPau":
                        $controller->InfoInscritPau();
                        break;
                    case "mes_prospections":
                        $controller->mes_prospections();
                        break;
                    case "noForum":
                        $controller->noForum();
                        break;
                    case "noForum_eleves":
                        $controller->noForum_eleves();
                        break;
                    case "supprimer":
                        $controller->supprimer();
                        break;
                    case "terminees":
                        $controller->terminees();
                        break;
                    case "upload":
                        $controller->upload();
                        break;
                }
            ?>
        </section>

        <!-- Footer -->
        <div id='footer'>
			<div class='right'>
				<li><input id='back' type='image' src='Pictures/Site/back.png' height="60"></li>
			</div>
        </div>

			<script type='text/javascript'>
                $(function() {
                    $('#back').click(function() {
                        window.location.href ='#';
                    });
                });
            </script>
        </footer>
    </body>
</html>
