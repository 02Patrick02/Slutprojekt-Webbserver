<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
}

if(!isset($_SESSION['username'])) //vanliga användare som inte är inloggade
{
  echo<<<NAV
  <nav>
    <ul>
      <li><a href="index.php">Start</a></li>
      <li><a href="Teknikum.php">Om Teknikum</a></li>
      <li><a href="login.php">Skapa inlägg</a></li>
      <li><a href="login.php">Logga in</a></li>
    </ul>
  </nav>
NAV;
}

else
{
  if($_SESSION['status']==1)//användare som har skapat ett konto och har status 1 
  {
  echo<<<NAV
  <nav>
    <ul>
      <li><a href="index.php">Inlägg</a></li>
      <li><a href="Teknikum.php">Om Teknikum</a></li>
      <li><a href="Formulär.php">Skapa inlägg</a></li>
      <li><a href="admin.php">Admin</a></li>
    </ul>
  </nav>
NAV;
  }

  elseif($_SESSION['status']==2) //admin som har status 2
  {
  echo<<<NAV
  <nav>
    <ul>
      <li><a href="index.php">inlägg</a></li>
	    <li><a href="Teknikum.php">Om Teknikum</a></li>
      <li><a href="Formulär.php">Skapa inlägg</a></li>
      <li><a href="admin.php">Admin</a></li>
    </ul>
  </nav>
NAV;
  }
}
?>