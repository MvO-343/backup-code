<!DOCTYPE html>
<html>
<head>
	<title>Bestelling bediening</title>
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
    bestelling_drinken.reservering_id,
    bestelling_drinken.drinken_id,
    bestelling_drinken.aantal,
    bestelling_drinken.gereed,
    drinken.naam
FROM
    bestelling_drinken
INNER JOIN drinken ON bestelling_drinken.drinken_id = drinken.id
WHERE
    bestelling_drinken.gereed = :gereed');

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
	  	$id_drinken = $row['drinken_id']
	  ?>
	  <tbody>
	   	 <tr>
	     	 <th scope="row"><?=  $row['reservering_id'] ?></th>
	     	 <td scope="row"><?=  $row['naam'] ?></td>
	     	 <td scope="row"><?=  $row['aantal'] ?></td>
	     	 <td scope="row"><?=  $row['gereed'] ?></td>
	     	 <td scope="row"><a href="bestelling_gereed.php?id_drinken=<?= $id_drinken ?>&id_reservering=<?= $id_reservering ?>">Gereed</a></td>
	   	 </tr>

	   	 <?php
	   	 }
	   	 ?>
	  </tbody>
	</table>

</body>
</html>