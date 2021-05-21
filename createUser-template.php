<?php
$str="";
if(isset($_GET['name'])){
			$username=$_GET['name'];
			$str="Användarnamnet $username är upptaget"; //kollar om användarnamned är upptaget
		}
		
elseif(isset($_GET['mail']))
	{
			$mail=$_GET['mail'];
			$str="Mailadressen $mail är upptagen"; //kollar om mailen är upptagen
	}
	
	if(isset($_POST['username']) &&isset($_POST['mail']) && isset($_POST['password'])) //kollar så att de är tillgänglig och filtrerar de
	{
		$username = filter_input(INPUT_POST,'username', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$mail = filter_input(INPUT_POST,'mail', FILTER_SANITIZE_EMAIL, FILTER_FLAG_STRIP_LOW);
		$password = filter_input(INPUT_POST,'password', FILTER_SANITIZE_EMAIL, FILTER_FLAG_STRIP_LOW);
		$password = password_hash($password, PASSWORD_DEFAULT);

		require "../include/connect.php";

		$sql="SELECT * FROM users WHERE username = ? OR email = ?";
		$res=$dbh->prepare($sql);
		$res->bind_param("ss", $username, $mail);
		$res->execute(); // utför frågan
		$result=$res->get_result();
		$row=$result->fetch_assoc();

		if($row !== NULL)
		{
			if($row['username'] === $username)
			{
				header("location:createUser.php?name=$username");
			}
			elseif($row['email'] === $mail)
			{
				header("location:createUser.php?=$mail");
			} 
		}

		
		else //skapar en användare som har status 1
		{
			$status = 1;
			$sql = "INSERT INTO users(username, email, password, status) VALUE (?,?,?,?)";
			$res=$dbh->prepare($sql);
			$res->bind_param("sssi",$username, $mail, $password, $status); //binder parametern till frågan
			$res->execute();
			
			$str="Användaren tillagd"; //skriver ut användaren tillagd
		}
	}
	else
		{
			$str.=<<<FORM
			<form action="createUser.php" method="post">
				<p><label for="username">Användarnamn:</label>
				<input type="text" id="username" name="username"></p>
				<p><label for="mail">Epost:</label>
				<input type="email" id="mail" name="mail"></p>
            	<p><label for="pwd">Lösenord:</label>
            	<input type="password" id="pwd" name="password"></p>
            	<p>
            	<input type="submit" value="Skapa användare">
            	</p>
          	</form>
FORM;
		}
	
?>

<!DOCTYPE html>

<html lang="sv">

  <head>
     <meta charset="utf-8">
     <title>Logga in</title>
		 <link rel="stylesheet" href="css/stilmall.css">
	</head>
  <body id="login">
    <div id="wrapper">
	
     <?php
	  require "header.php";
	  require "meny.php";
	 ?>
      
		
	  <main>
		<section>
			<?php 
				echo "$str"; 
			?>
		</section>
		</main>

    </div>
			<?php
			require "footer.php";
			?>

	</body>
</html>