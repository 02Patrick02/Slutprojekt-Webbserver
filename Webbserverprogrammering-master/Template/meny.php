<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
}

if(!isset($_SESSION['username']))
{
  echo<<<NAV
  <nav>
    <ul>
      <li><a href="index.php">Start</a></li>
      <li><a href="Teknikum.php">Om Teknikum</a></li>
      <li><a href="Formulär.php">Formulär om Tkenikum</a></li>
      <li><a href="login.php">Logga in</a></li>
    </ul>
  </nav>
NAV;
}

else
{
  if($_SESSION['status']==1)
  {
  echo<<<NAV
  <nav>
    <ul>
      <li><a href="index.php">Start</a></li>
      <li><a href="Teknikum.php">Om Teknikum</a></li>
      <li><a href="Formulär.php">Formulär om Teknikum</a></li>
      <li><a href="admin.php">Admin</a></li>
    </ul>
  </nav>
NAV;
  }

  elseif($_SESSION['status']==2)
  {
  echo<<<NAV
  <nav id="admin">
    <ul>
      <li><a href="index.php">Start</a></li>
	  <li><a href="Teknikum.php">Om Teknikum</a></li>
      <li><a href="Formulär.php">Formulär om Teknikum</a></li>
      <li><a href="admin.php">Admin</a></li>
    </ul>
  </nav>
NAV;
  }
}
?>