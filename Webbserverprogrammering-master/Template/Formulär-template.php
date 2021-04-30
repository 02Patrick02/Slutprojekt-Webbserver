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
					<h2>Formulär om teknikum</h2>
		
				<section>
			<form action="" method="post">
            <p><label for="user">Vad tycker du om bloggen?</label>
			</br>
            <input type="text" id="user" name="username"></p>
            <p><label for="pwd">Lösenord:</label>
			</br>
            <input type="text" id="pwd" name="password"></p>
            <p>
            <input type="submit" value="Skicka svar">
            </p>
			</form>
				</section>
			</main>
						
			
				</section
			</main>
			
		</div>
		<!--Egen fil -->
		<?php 
			require "footer.php";
		?>
  
  </body>
</html>