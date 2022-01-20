<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<link rel="stylesheet" href="style.css">
<ul>
  <li><a href="home.php">Home</a></li>
  <li><a href="hond.php">Hond</a></li>
  <li><a href="kat.php">Kat</a></li>
  <li style="float:right"><a class="active" href="inloggen.php">Inloggen</a></li>
</ul>

<?php
include 'verbinding.php';

$parameters = array(':nat_droog' => 'NAT');

$sth = $pdo->prepare('SELECT * FROM hond WHERE nat_droog = :nat_droog');

$sth->execute($parameters);
?>
<h1>NAT HONDENVOER</h1>
<table border="0">
	<tr>
		<th>Naam:</th>
		<th>prijs:</th>
		<th>omschrijving:</th>
		<th></th>
		<th></th>
	</tr>

<?php 

while ($row = $sth->fetch()) 
{
?>
	<tr>
	<td><?= $row['naam']; ?></td>
	<td><?= $row['prijs']; ?></td>
	<td><?= $row['beschrijving']; ?></td>
	<td><a href="updaten.php?id=<?php echo $row['id'] ?>">Updaten</a></td>
	<td><a href="verwijderen.php?id=<?php echo $row['id'] ?>">Verwijderen</a></td>
</tr>
 


<?php
}

echo "</table>";
?>
 
<?php 
$parameters = array(':nat_droog' => 'DROOG');

$sth = $pdo->prepare('SELECT * FROM hond WHERE nat_droog = :nat_droog');

$sth->execute($parameters);
?>

<h1>DROOG HONDENVOER</h1>
<table border="0">
	<tr>
		<th>Naam:</th>
		<th>prijs:</th>
		<th>omschrijving:</th>
		<th></th>
		<th></th>
	</tr>

<?php 

while ($row = $sth->fetch()) 
{
?>
	<tr>
	<td><?= $row['naam']; ?></td>
	<td><?= $row['prijs']; ?></td>
	<td><?= $row['beschrijving']; ?></td>
	<td><a href="updaten.php?id=<?php echo $row['id'] ?>">Updaten</a></td>
	<td><a href="verwijderen.php?id=<?php echo $row['id'] ?>">Verwijderen</a></td>
</tr>
 


<?php
}

echo "</table>";
?>
</body>
</html>