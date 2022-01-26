<!DOCTYPE html>
<html>
<head>
	<title>Reserveren</title>
	<?php

	require 'bootstrap.php';
	require 'nav.php';
	require 'connectie.php';
	?>
</head>
<body>

<?php

$sth = $pdo->prepare('SELECT
							reservering.id,
						    reservering.aantal_personen,
						    reservering.datum_tijd,
						    klant.naam
					FROM
						    reservering
					INNER JOIN klant on reservering.klant_id = klant.id');

$sth->execute();

?>

	<table class="table">
	  <thead>
	   	 <tr>
	   	   <th scope="col">Reservering</th>
	   	   <th scope="col">Naam</th>
	       <th scope="col">Aantal personen</th>
	   	   <th scope="col">Datum en Tijd</th>
	   	 </tr>
	  </thead>

	  <?php
	  while($row = $sth->fetch())
	  {
	  ?>
	  <tbody>
	   	 <tr>
	     	 <th scope="row"><?=  $row['id'] ?></th>
	     	 <td scope="row"><?=  $row['naam'] ?></td>
	     	 <td scope="row"><?=  $row['aantal_personen'] ?></td>
	     	 <td scope="row"><?=  $row['datum_tijd'] ?></td>
	     	 <td scope="row"><a href="kok_gereed.php?id_gerechten=<?= $id_gerechten ?>&id_reservering=<?= $id_reservering ?>">Gereed</a></td>
	   	 </tr>

	   	 <?php
	   	 }
	   	 echo "</table>";
	   	 ?>
	  </tbody>
	</table>

<a href="reservering_maken.php" class="btn btn-outline-primary">Reservering Maken</a>

</body>
</html>