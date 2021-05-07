<!DOCTYPE html>
<html lang="sv">
  <head>
     <meta charset="utf-8">
     <title>Formulär om Teknikum</title>
		 <link rel="stylesheet" href="css/stilmall.css">
	</head>
  <body id="produkter">
    <div id="wrapper">
      
	<?php 
		require "header.php";
		require "meny.php";
	?>
			
			<main> <!--Huvudinnehåll-->
				<section id="content">
					<h2>Skapa inlägg</h2>
					
					<form action="Formulär.php" method="post">
					<p><label for="title">Titel</label>
					<br>
          		  	<input type="text" id="title" name="title"></p>
            		<p><label for="text">text:</label>
					<br>
					<textarea rows="3" cols="30" id="text" name="text"></textarea></p>
           			<p><input type="submit" value="Skapa">
            		</p>
					</form>
				</section>
			</main>

		<!--Egen fil -->
		<?php 
			require "footer.php";
		?>
  
  </body>
</html>