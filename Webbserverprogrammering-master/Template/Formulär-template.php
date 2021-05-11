<?php
$str="";
	if(isset($_POST['text']))
	{
		$description = filter_input(INPUT_POST,'text', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$title = filter_input(INPUT_POST,'title', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		session_start();
		
		$username = $_SESSION['username'];
		
		require "../include/connect.php";
		
		$sql = "INSERT INTO posts(username, title, description) VALUE (?,?,?)";
		$res=$dbh->prepare($sql);
		$res->bind_param("sss",$username, $title, $description);
		$res->execute();
		
		$str="Inlägg skapat";

	}
	else{
		$str = <<<FORM
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
FORM;
	}
	
	
?>
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
					<?php 
						echo $str;
					?>
					
				</section>
			</main>

		<!--Egen fil -->
		<?php 
			require "footer.php";
		?>
  
  </body>
</html>