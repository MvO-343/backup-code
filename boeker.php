<!DOCTYPE html>
<html>
<head>
	<title>Boeker</title>

	<?php
	require("nav.php"); 
	require("bootstrap.php"); 
	?>

</head>
<body>
<h1>Boekers.</h1>

<?php

include 'connection.php';

$parameters = array(':id' => '1');
$sth = $pdo->prepare('SELECT * FROM boeker WHERE id = :id');

$sth->execute($parameters);
?>

<table class="table">
	<thead>
    <tr>
      <th scope="col">Boeker</th>
      <th scope="col">Naam</th>
      <th scope="col">Adres</th>
      <th scope="col">Telefoonnummer</th>
      <th scope="col">Email</th>
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
      <td scope="row"><?= $row['adres']; ?></td>
      <td scope="row"><?= $row['telefoonnummer']; ?></td>
      <td scope="row"><?= $row['email']; ?></td>
    </tr>
   
<?php	
}

echo "</table>";
?>

 </tbody>
</table>
</body>
</html>