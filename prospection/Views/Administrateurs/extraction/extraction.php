<?php
    // Base de données
    try{
        $pdo = new PDO(DSN,USERNAME,PASSWORD);
    }
    catch (PDOException $e){
        die("Error ! : " . $e->getTraceAsString());
    }

    $query ="SELECT * FROM forum ORDER BY id";  
    $result = $pdo->prepare($query);
    $result->execute(array("%$query%")); 

    $query1 ="SELECT * FROM lycee ORDER BY id";  
    $result1 = $pdo->prepare($query1);
    $result1->execute(array("%$query1%"));

    $query2 ="SELECT * FROM contactlycee ORDER BY id";  
    $result2 = $pdo->prepare($query2);
    $result2->execute(array("%$query2%")); 
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
			<!-- La navigation au sein de la page Extraction (Exporter, Importer) -->
			<h2 style='margin-bottom: 0px; margin-top: 0px; background-color: #F2F2F2;'></h2>
			<nav id="navigation_extraction" style='background-color: #F2F2F2; height: 80px'>
				<a href="?view=extraction&pre=extraction" style='color:black; text-decoration:none;' id="fichier"><div><strong>EXPORTER</strong></div></a>
				<a href="?view=analyse&pre=extraction" style='color:black; text-decoration:none;' id="analyse"><div><strong>IMPORTER</strong></div></a>
			</nav>
		</section>
	</body>
</html>
<!DOCTYPE html>  
<html>  
    <head>  
         <title>Webslesson Tutorial | Export Mysql Table Data to CSV file in PHP</title>  
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
    </head>  
    <body>  
         <br /><br />  
         <div class="container" style="width:900px;">  
              <h2 align="center">Exporter la table forum de la base sql en fichier .csv</h2>  
              <h3 align="center">Contenu de la table forum</h3>                 
              <br />  
              <form method="post" action="Views/Administrateurs/extraction/exportSQL-CSV_PDOFORUM.php" align="center">
               <div style="text-align: center;">
                <input type="submit" name="export" value="CSV Export" class="btn btn-success" />  
               </div>
              </form>  
              <br />  
              <div class="table-responsive" id="employee_table">  
                   <table class="table table-bordered">  
                        <tr>  
                             <th width="5%">ID</th>  
                             <th width="25%">Lycee</th>  
                             <th width="35%">DateForum</th>  
                             <th width="10%">Heure de debut</th>  
                             <th width="20%">Heure de fin</th>  
                             <th width="20%">Courrier</th>  
                             <th width="20%">Public</th>  
                             <th width="20%">Année du dernier forum</th> 
                             <th width="20%">Type de prospection</th>
                             <th width="20%">Participant1</th>  
                             <th width="20%">Participant2</th>  
                             <th width="20%">Compte Rendu</th>  
                        </tr>  
                   <?php  
                   while($row = $result->fetch())  
                   {  
                   ?>  
                        <tr>  
                             <td><?php echo $row["Id"]; ?></td>  
                             <td><?php echo $row["Lycee"]; ?></td>  
                             <td><?php echo $row["DateForum"]; ?></td>  
                             <td><?php echo $row["Heure_Debut"]; ?></td>  
                             <td><?php echo $row["Heure_Fin"]; ?></td>  
                             <td><?php echo $row["Courrier"]; ?></td>
                             <td><?php echo $row["Public"]; ?></td>
                             <td><?php echo $row["Annee_du_dernier_forum"]; ?></td>
                             <td><?php echo $row["Type_de_prospection"]; ?></td>
                             <td><?php echo $row["Participant1"]; ?></td>
                             <td><?php echo $row["Participant2"]; ?></td>
                             <td><?php echo $row["CompteRendu"]; ?></td>
                        </tr>  
                   <?php       
                   }  
                   ?>  
                   </table>  
              </div>  
         </div>  
    </body>  
</html>  
<!DOCTYPE html>  
<html>  
    <head>  
         <title>Webslesson Tutorial | Export Mysql Table Data to CSV file in PHP</title>  
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
    </head>  
    <body>  
         <br /><br />  
         <div class="container" style="width:900px;">  
              <h2 align="center">Exporter la table lycee de la base sql en fichier .csv</h2>  
              <h3 align="center">Contenu de la table lycee</h3>                 
              <br />  
              <form method="post" action="Views/Administrateurs/extraction/exportSQL-CSV_PDOLYCEE.php" align="center">  
              	<div style="text-align: center;">
                   <input type="submit" name="export" value="CSV Export" class="btn btn-success" /> 
                </div> 
              </form>  
              <br />  
              <div class="table-responsive" id="employee_table">  
                   <table class="table table-bordered">  
                        <tr>  
                             <th width="5%">Id</th>  
                             <th width="25%">Type</th>  
                             <th width="35%">Nom</th>  
                             <th width="10%">Code_Postal</th>  
                             <th width="20%">Departement</th> 
                             <th width="20%">Ville</th> 
                             <th width="20%">Proche_de</th> 
                             <th width="20%">Standard</th> 
                             <th width="20%">Fax</th> 
                             <th width="20%">Mail_Lycee</th> 
                             <th width="20%">AdressePostale</th> 
                             <th width="20%">Commentaire1</th> 
                             <th width="20%">Commentaire2</th>
                             <th width="20%">Commentaire3</th> 
                             <th width="20%">Commentaire4</th>   
                        </tr>  
                   <?php  
                   while($row = $result1->fetch())  
                   {  
                   ?>  
                        <tr>  
                             <td><?php echo $row["Id"]; ?></td>  
                             <td><?php echo $row["Type"]; ?></td>  
                             <td><?php echo $row["Nom"]; ?></td>  
                             <td><?php echo $row["Code_Postal"]; ?></td>  
                             <td><?php echo $row["Departement"]; ?></td>  
                             <td><?php echo $row["Ville"]; ?></td>  
                             <td><?php echo $row["Proche_de"]; ?></td>  
                             <td><?php echo $row["Standard"]; ?></td>  
                             <td><?php echo $row["Fax"]; ?></td>  
                             <td><?php echo $row["Mail_Lycee"]; ?></td>  
                             <td><?php echo $row["AdressePostale"]; ?></td> 
                             <td><?php echo $row["Commentaire1"]; ?></td>  
                             <td><?php echo $row["Commentaire2"]; ?></td>  
                             <td><?php echo $row["Commentaire3"]; ?></td>  
                             <td><?php echo $row["Commentaire4"]; ?></td>
                             
                        </tr>  
                   <?php       
                   }  
                   ?>  
                   </table>  
              </div>  
         </div>  
    </body>  
</html>
<!DOCTYPE html>  
<html>  
    <head>  
         <title>Webslesson Tutorial | Export Mysql Table Data to CSV file in PHP</title>  
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
    </head>  
    <body>  
         <br /><br />  
         <div class="container" style="width:900px;">  
              <h2 align="center">Exporter la table contactlycee de la base sql en fichier .csv</h2>  
              <h3 align="center">Contenu de la table contactlycee</h3>                 
              <br />  
              <form method="post" action="Views/Administrateurs/extraction/exportSQL-CSV_PDOCONTACTLYCEE.php" align="center">  
                <div style="text-align: center;">
                   <input type="submit" name="export" value="CSV Export" class="btn btn-success" /> 
                </div> 
              </form>  
              <br />  
              <div class="table-responsive" id="employee_table">  
                   <table class="table table-bordered">  
                        <tr>  
                             <th width="5%">Id</th>  
                             <th width="25%">Genre</th>  
                             <th width="35%">Nom</th>  
                             <th width="10%">Prenom</th>  
                             <th width="20%">Fonction</th> 
                             <th width="20%">Mail</th> 
                             <th width="20%">MailForum</th> 
                             <th width="20%">LigneDirecte</th> 
                             <th width="20%">Idlycee</th>  
                        </tr>  
                   <?php  
                   while($row = $result2->fetch())  
                   {  
                   ?>  
                        <tr>  
                             <td><?php echo $row["Id"]; ?></td>  
                             <td><?php echo $row["Genre"]; ?></td>  
                             <td><?php echo $row["Nom"]; ?></td>  
                             <td><?php echo $row["Prenom"]; ?></td>  
                             <td><?php echo $row["Fonction"]; ?></td>  
                             <td><?php echo $row["Mail"]; ?></td>  
                             <td><?php echo $row["MailForum"]; ?></td>  
                             <td><?php echo $row["LigneDirecte"]; ?></td>  
                             <td><?php echo $row["Idlycee"]; ?></td>
                        </tr>  
                   <?php       
                   }  
                   ?>  
                   </table>  
              </div>  
         </div>  
    </body>  
</html>  