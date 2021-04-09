<?php
	$dbh = new mysqli("localhost", "username", "password", "Blogg");
	
	if(!$dbh) {
		echo "Ingen kontakt med databasen";
		exit;
	}
?>