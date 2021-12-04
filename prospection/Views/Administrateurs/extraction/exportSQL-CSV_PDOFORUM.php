<?php
	// Open database connection
	define("USERNAME", "root");
	define("PASSWORD", "");
	define("DSN", "mysql:host=localhost;dbname=test;charset=utf8");

	$dbh = new PDO(DSN,USERNAME,PASSWORD);
	header("Content-Type: text/csv");
	header("Content-Disposition: attachment;filename=forum_data.csv");

	// SQL Query for Data
	$sql = "SELECT * FROM forum;";
	// Prepare Query, Bind Parameters, Execute Query
	$STH = $dbh->prepare($sql);
	$STH->execute();

	// Export to .CSV
	$fp = fopen("php://output", "w");

	// First set
	$first_row = $STH->fetch(PDO::FETCH_ASSOC);
	$headers = array_keys($first_row);
	fputcsv($fp, $headers); // put the headers
	fputcsv($fp, array_values($first_row)); // put the first row

	while ($row = $STH->fetch(PDO::FETCH_NUM))  {
	fputcsv($fp,$row); // push the rest
	}
	fclose($fp);
?>