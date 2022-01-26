<!DOCTYPE html>
<html>
<head>
	<title>Eten</title>
</head>
<body>
<?php
try
{
	$pdo = new PDO("mysql:host=localhost;dbname=fastfood", 'root', '');
}
catch(PDOException $e)
{
	echo $e->getMessage();
}

$parameters = array();
$sth = $pdo->prepare('SELECT * FROM snacks');

$sth->execute($parameters);
?>
<table border="0">
	<tr>
		<th>Naam:</th>
		<th>omschrijving:</th>
		<th>prijs:</th>
		<th></th>
		<th></th>
	</tr>

<?php

while ($row = $sth->fetch()) 
{
	// echo $row['naam'].'<br />';
	// echo $row['omschrijving'].'<br />';
	// echo $row['prijs'].'<br />';
	// echo ' <a href= "updaten.php">Updaten</a><br /><br />';

?>

<tr>
	<td><?= $row['naam']; ?></td>
	<td><?= $row['omschrijving']; ?></td>
	<td><?= $row['prijs']; ?></td>
	<td><a href="updaten.php?id=<?php echo $row['id'] ?>">Updaten</a></td>
	<td><a href="verwijderen.php?id=<?php echo $row['id'] ?>">Verwijderen</a></td>
</tr>


<?php

}

echo "</table>";

?>
<a href="toevoegen.php">toevoegen</a>
</body>
</html>