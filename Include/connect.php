<?php //kopplar till en databas
	$dbh = new mysqli("localhost", "username", "password", "blogg");
	
	if(!$dbh) {
		echo "Ingen kontakt med databasen";
		exit;
	}
?>