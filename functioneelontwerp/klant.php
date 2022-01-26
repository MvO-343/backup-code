<!DOCTYPE html>
<html>
<head>
	<title>Klant</title>

	<?php

	require 'bootstrap.php';
	require 'nav.php';
	require 'connectie.php';

	?>
</head>
<body>

	<?php

$sth = $pdo->prepare('SELECT * FROM klant');

$sth->execute();

?>

	<table class="table">
	  <thead>
	   	 <tr>
	   	   <th scope="col">Klant</th>
	   	   <th scope="col">Naam</th>
	       <th scope="col">Telefoonnummer</th>
	   	   <th scope="col">Email</th>
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
	     	 <td scope="row"><?=  $row['telefoonnummer'] ?></td>
	     	 <td scope="row"><?=  $row['email'] ?></td>
	   	 </tr>

	   	 <?php
	   	 }
	   	 echo "</table>";
	   	 ?>
	  </tbody>
	</table>

</body>
</html>