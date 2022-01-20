<html>
<head>
	<title>Dierenwinkel</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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

$parameters = array(':nat_droog' => 'DROOG');

$sth = $pdo->prepare('SELECT * FROM kat WHERE nat_droog = :nat_droog');

$sth->execute($parameters);
?>
<h1>DROOG KATTENVOER</h1>
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
$parameters = array(':nat_droog' => 'NAT');

$sth = $pdo->prepare('SELECT * FROM kat WHERE nat_droog = :nat_droog');

$sth->execute($parameters);
?>
<h1>NAT KATTENVOER</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Naam:</th>
      <th scope="col">prijs:</th>
      <th scope="col">omschrijving:</th>
    </tr>
  </thead>
<?php 

while ($row = $sth->fetch()) 
{
?>


 <tbody>
 <tr>
      <th scope="row"><?= $row['naam']; ?></th>
      <td colspan="2"><?= $row['prijs']; ?></td>
      <td><?= $row['beschrijving']; ?></td>
      <td><a href="updaten.php?id=<?php echo $row['id'] ?>">Updaten</a></td>
	<td><a href="verwijderen.php?id=<?php echo $row['id'] ?>">Verwijderen</a></td>
    </tr>
  


<?php
}

echo "</table>";
?>
</tbody>
</table>
</body>
</html>