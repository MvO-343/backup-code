<!DOCTYPE html>
<html>
<head>
	<title>Bewerk</title>
	<?php

	require 'bootstrap.php';
	require 'nav.php';
	require 'connectie.php';
?>
</head>
<body>

<?php

// Haalt ID op uit URL
 $id_gerechten = $_GET['id_gerechten'];
 $id_naam = $_GET['id_naam'];
 $id_prijs = $_GET['id_prijs'];

//Controleert of de knop word ingedrukt
if (isset($_POST['verzend']))
	{
		//Post naam, omschrijving, prijs op uit t formulier.
		$parameters = array(':id' => $id_gerechten,
							':naam' => $_POST['naam'],
							':prijs' => $_POST['prijs']);
		//bereid de update van de waarden van t formulier in de database voor
		$sth = $pdo->prepare('UPDATE gerechten SET naam = :naam , prijs = :prijs WHERE id = :id ');
		//Update de gegevens in de database
		//Voegt de parameters toe.
		$sth->execute($parameters);

		header("Refresh: 0.2; URL=menu.php");
	}

?>

<form action="" method="POST">

  <label for="naam">naam:</label><br>
  <input type="text" id= "naam" name="naam" value="<?= $id_naam ?>"><br>

  <label for="prijs">prijs:</label><br>
  <input type="text" id= "prijs" name="prijs" value="<?= $id_prijs ?>"><br><br>

  <input type="submit" value="Updaten" name="verzend">

</form>

</body>
</html>