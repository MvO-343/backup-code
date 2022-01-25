<!DOCTYPE html>
<html>
<head>
	<title>Boekingen</title>

	<?php
	require("nav.php"); 
	require("bootstrap.php"); 
	?>

</head>
<body>
<h1>Boeking aanmaken.</h1>

<?php

include 'connection.php';

$sth = $pdo->prepare('SELECT
						    boeking.id,
						    boeking.aantal_personen,
							boeking.tijdstip,  
						    boeker.naam,
						    baan.max_personen
						FROM
						    boeking
						INNER JOIN boeker ON boeking.boeker_id = boeker.id
						INNER JOIN baan ON boeking.baan_id = baan.id');

$sth->execute();
?>

<table class="table">
	<thead>
    <tr>
      <th scope="col">Boeking</th>
      <th scope="col">Boeker</th>
      <th scope="col">Baan</th>
      <th scope="col">Personen</th>
      <th scope="col">Tijd</th>
    </tr>
</thead>
<?php

while ($row = $sth->fetch()) 
{

?>
<tbody>
    <tr>
      <th scope="row"><?= $row['id']; ?></th>
      <td scope="row"><?= $row['naam']; ?></td>
      <td scope="row"><?= $row['max_personen']; ?></td>
      <td scope="row"><?= $row['aantal_personen']; ?></td>
      <td scope="row"><?= $row['tijdstip']; ?></td>
    </tr>
   
<?php	
}

echo "</table>";
?>

 </tbody>
</table>
</body>
</html>