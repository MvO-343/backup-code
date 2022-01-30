<!DOCTYPE html>
<html>
<head>
	<title>Bestelling kok</title>
	<?php

	require 'bootstrap.php';
	require 'nav.php';
	require 'connectie.php';
	?>
</head>
<body>

	<?php
$parameters = array(':gereed'=>'0');
$sth = $pdo->prepare('SELECT
    bestelling_gerechten.reservering_id,
    bestelling_gerechten.gerechten_id,
    bestelling_gerechten.aantal,
    bestelling_gerechten.gereed,
    gerechten.naam
FROM
    bestelling_gerechten
INNER JOIN gerechten ON bestelling_gerechten.gerechten_id = gerechten.id
WHERE
    bestelling_gerechten.gereed = :gereed');

$sth->execute($parameters);

?>

	<table class="table">
	  <thead>
	   	 <tr>
	   	   <th scope="col">Reservering</th>
	   	   <th scope="col">Gerecht</th>
	       <th scope="col">Aantal</th>
	       <th scope="col">Gereed</th>
	   	 </tr>
	  </thead>

	  <?php
	  while($row = $sth->fetch())
	  {
	  	$id_reservering = $row['reservering_id'];
	  	$id_gerechten = $row['gerechten_id'];
	  ?>
	  <tbody>
	   	 <tr>
	     	 <th scope="row"><?=  $row['reservering_id'] ?></th>
	     	 <td scope="row"><?=  $row['naam'] ?></td>
	     	 <td scope="row"><?=  $row['aantal'] ?></td>
	     	 <td scope="row"><?=  $row['gereed'] ?></td>
	     	 <td scope="row"><a href="kok_gereed.php?id_gerechten=<?= $id_gerechten ?>&id_reservering=<?= $id_reservering ?>">Gereed</a></td>
	   	 </tr>

	   	 <?php
	   	 }
	   	 ?>
	  </tbody>
	</table>

</body>
</html>