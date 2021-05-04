<?php
	require "../include/connect.php";

	$username=$_SESSION['username'];
	
	$sql = "SELECT * FROM users WHERE username = ?";	
	$res=$dbh->prepare($sql);
	$res->bind_param("s", $username);
	$res->execute();
	$result=$res->get_result();
?>

<!DOCTYPE html>
<html lang="sv">
  <head>
     <meta charset="utf-8">
     <title>admin</title>
		 <link rel="stylesheet" href="css/stilmall.css">
  </head>
  <body id="admin">
    <div id="wrapper">
	
	<?php 
		require "header.php";
		require "meny.php";
	?>
		
		
		<main> <!--Huvudinnehåll-->
			<section id="content">
				<h2>Användare</h2>
				<table>	
					<thead>
						<tr>
							<th>Namn</th>
							<th></th>
							<th>Status</th>
							
						</tr>
					</thead>
					<tbody>
					
					<?php
					while($row=$result->fetch_assoc()){
						echo "<tr><td>";
						echo $row['username'];
						echo "</td><td>";
						echo "</td><td>";
						echo $row['status'];
						echo "</td><td>";
					}
					?>
					</tbody>
				</table>

			</section>
		</main>
		<?php 
			require "footer.php";
		?>
		<p id="uniktId"></p>
		<a href="logout.php#uniktId">logga ut</a>
	</div>
  </body>
</html>