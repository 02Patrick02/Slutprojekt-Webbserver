<?php
	$dbh = new mysqli("localhost", "patrick", "password", "blogg");
	
	if(!$dbh) {
		echo "Ingen kontakt med databasen";
		exit;
	}
?>