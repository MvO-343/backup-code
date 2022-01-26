<!DOCTYPE html>
<html>
<head>
	<title>Snacks toevoegen</title>
</head>
<body>
<form action="" method="POST">

  <label for="naam">naam:</label><br>
  <input type="text" id= "naam" name="naam"><br>

  <label for="omschrijving">omschrijving:</label><br>
  <input type="text" id= "omschrijving" name="omschrijving"><br>

  <label for="prijs">prijs:</label><br>
  <input type="text" id= "prijs" name="prijs"><br><br>

  <input type="submit" value="Toevoegen" name="verzend">
</form>

<?php
try
{
	$pdo = new PDO("mysql:host=localhost;dbname=fastfood", 'root', '');
}
catch(PDOException $e)
{
	echo $e->getMessage();
}
if (isset($_POST['verzend']))
{

$parameters = array(':id' => null,
					':naam' => $_POST['naam'],
					':omschrijving' => $_POST['omschrijving'],
					':prijs' => $_POST['prijs']);

$sth = $pdo->prepare('INSERT INTO snacks(id, naam, omschrijving, prijs) VALUES ( :id, :naam, :omschrijving, :prijs)');

$sth->execute($parameters);
 
header("location:weergeven.php");
}

// if  ($pdo->lastInsertId() !=0)
// {
// 	echo"<br /> toevoegen geslaagd met nr.: ";
// 	echo $pdo->lastInsertId();
// }
?>
</body>
</html>