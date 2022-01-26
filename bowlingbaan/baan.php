<!DOCTYPE html>
<html>
<head>
	<title>Banen</title>

	<?php
	require("nav.php"); 
	require("bootstrap.php"); 
	?>

</head>
<body>
<h1>Banen.</h1>

<?php

include 'connection.php';

$sth = $pdo->prepare('SELECT * FROM baan');

$sth->execute();
?>

<table class="table">
	<thead>
    <tr>
      <th scope="col">Baan</th>
      <th scope="col">maximaal personen</th>
      <th scope="col">Prijs</th>
    </tr>
</thead>
<?php

while ($row = $sth->fetch()) 
{

?>
<tbody>
    <tr>
      <th scope="row"><?= $row['id']; ?></th>
      <td scope="row"><?= $row['max_personen']; ?></td>
      <td scope="row"><?= $row['prijs']; ?></td>
    </tr>
   
<?php	
}

echo "</table>";
?>

 </tbody>
</table>
</body>
</html>