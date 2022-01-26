<!DOCTYPE html>
<html>
<head>
	<title>Aanmaken</title>
	<?php

	require 'bootstrap.php';
	require 'nav.php';
	require 'connectie.php';
?>
</head>
<body>

	<form action="" method="POST">

  <label for="naam">naam:</label><br>
  <input type="text" id= "naam" name="naam"><br>

  <label for="prijs">prijs:</label><br>
  <input type="text" id= "prijs" name="prijs"><br><br>

  <input type="submit" value="Toevoegen" name="verzend">
</form>

<?php
//kijkt of de knop word ingedrukt
if (isset($_POST['verzend']))
{
//Post naam, prijs op uit t formulier.
$parameters = array(':naam' => $_POST['naam'],
					':prijs' => $_POST['prijs']);

$sth = $pdo->prepare('INSERT INTO gerechten(naam, prijs) VALUES (:naam, :prijs)');

$sth->execute($parameters);
 
header("Refresh: 0.2; URL=menu.php");
}
?>
</body>
</html>