<?php
		require "../include/connect.php";
		$sql = "SELECT * FROM posts"; //väljer och tar från databasen
		$res=$dbh->prepare($sql);
		$res->execute();		
		$result=$res->get_result();
?>
<!DOCTYPE html>
<html lang="sv">
  <head>
     <meta charset="utf-8">
     <title>Min Teknikumblogg</title>
		 <link rel="stylesheet" href="css/stilmall.css">
		 
	</head>

	<body id="index">
		<div id="wrapper">

			<?php 
				require "header.php"; // tar med header som finns i en annan fil och visas på sidan
				require "meny.php";
			?>
			
				<main> <!--Huvudinnehåll-->
				
				<p>Startsida för min blogg</p>

				<?php
					while($row=$result->fetch_assoc()){
						echo <<<ARTICLE
						<article>
							<h3>{$row['title']}</h3>
							<p>{$row['description']}</p>
							<p>{$row['username']}</p>
						</article>
						
ARTICLE;
					}	
				?>

				</main>				
			
			
			</div>
			<!--Egen fil -->
			<?php 
			require "footer.php";
			?>
	</body>
</html>