<!DOCTYPE html>
<html>
<head>
	<title>Bewerk</title>
</head>
<body>

<?php
//Connectie naar database
try
	{
		$pdo = new PDO("mysql:host=localhost;dbname=fastfood", 'root', '');
	}
catch(PDOException $e)
	{
		echo $e->getMessage();
	}

//Controleert of de knop word ingedrukt
if (isset($_POST['verzend']))
	{
		//Haalt ID op uit URL, Post naam, omschrijving, prijs op uit t formulier.
		$parameters = array(':id' => $_GET['id'],
							':naam' => $_POST['naam'],
							':omschrijving' => $_POST['omschrijving'],
							':prijs' => $_POST['prijs']);
		//bereid de update van de waarden van t formulier in de database voor
		$sth = $pdo->prepare('UPDATE snacks SET naam = :naam , omschrijving = :omschrijving , prijs = :prijs WHERE id = :id ');
		//Update de gegevens in de database
		$sth->execute($parameters);

		header("location:weergeven.php");
	}


	//Haalt het id op uit de URL
	$parameters = array(':id' => $_GET['id']);
	//Bereid de select statement voor om de NIEUWE waarden te zien van het geselecteerde ID
	$sth = $pdo->prepare('SELECT * FROM snacks WHERE id = :id');
	
	$sth->execute($parameters);
	//Fetch haalt de waarden op van het geselecteerde ID
	$row = $sth->fetch();

?>

<form action="" method="POST">

  <label for="naam">naam:</label><br>
  <input type="text" id= "naam" name="naam" value="<?= $row['naam']; ?>"><br>

  <label for="omschrijving">omschrijving:</label><br>
  <input type="text" id= "omschrijving" name="omschrijving" row="" cols="45" value="<?= $row['omschrijving']; ?>"><br>

  <label for="prijs">prijs:</label><br>
  <input type="text" id= "prijs" name="prijs" value="<?= $row['prijs']; ?>"><br><br>

  <input type="submit" value="Updaten" name="verzend">

</form>

</body>
</html>