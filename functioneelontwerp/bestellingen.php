<!DOCTYPE html>
<html>
<head>
	<title>Bestelling</title>
	<?php

	require 'bootstrap.php';
	require 'nav.php';
	require 'connectie.php';
	?>
</head>
<body>

<?php

$sth = $pdo->prepare('SELECT 
	bestelling_gerechten.reservering_id,
    bestelling_gerechten.gerechten_id,
    bestelling_gerechten.aantal,
    gerechten.naam
FROM 
	bestelling_gerechten 
INNER JOIN gerechten ON bestelling_gerechten.gerechten_id = gerechten.id');

$sth->execute();

?>

	<table class="table">
	  <thead>
	   	 <tr>
	   	   <th scope="col">Reservering</th>
	   	   <th scope="col">Gerecht</th>
	       <th scope="col">Aantal</th>
	   	 </tr>
	  </thead>

	  <?php
	  while($row = $sth->fetch())
	  {
	  ?>
	  <tbody>
	   	 <tr>
	     	 <th scope="row"><?=  $row['reservering_id'] ?></th>
	     	 <td scope="row"><?=  $row['naam'] ?></td>
	     	 <td scope="row"><?=  $row['aantal'] ?></td>
	   	 </tr>

	   	 <?php
	   	 }
	   	 echo "</table>";
	   	 ?>
	  </tbody>
	</table>

	<?php

$sth = $pdo->prepare('SELECT 
	bestelling_drinken.reservering_id,
    bestelling_drinken.drinken_id,
    bestelling_drinken.aantal,
    drinken.naam
FROM 
	bestelling_drinken 
INNER JOIN drinken ON bestelling_drinken.drinken_id = drinken.id');

$sth->execute();

?>

	<table class="table">
	  <thead>
	   	 <tr>
	   	   <th scope="col">Reservering</th>
	   	   <th scope="col">Gerecht</th>
	       <th scope="col">Aantal</th>
	   	 </tr>
	  </thead>

	  <?php
	  while($row = $sth->fetch())
	  {
	  ?>
	  <tbody>
	   	 <tr>
	     	 <th scope="row"><?=  $row['reservering_id'] ?></th>
	     	 <td scope="row"><?=  $row['naam'] ?></td>
	     	 <td scope="row"><?=  $row['aantal'] ?></td>
	   	 </tr>

	   	 <?php
	   	 }
	   	 echo "</table>";
	   	 ?>
	  </tbody>
	</table>
<a href="bestelling_bediening.php" class="btn btn-outline-primary">Bestellingen bediening</a>
<a href="bestelling_kok.php" class="btn btn-outline-primary">Bestellingen kok</a>
</body>
</html>