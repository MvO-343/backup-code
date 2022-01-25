<!DOCTYPE html>
<html>
<head>
	<title>Menu's</title>

	<?php

	require 'bootstrap.php';
	require 'nav.php';
	require 'connectie.php';

	?>
</head>
<body>

	<?php

$sth = $pdo->prepare('SELECT * FROM drinken');

$sth->execute();

?>

	<table class="table">
	  <thead>
	   	 <tr>
	   	   <th scope="col">Drinken</th>
	   	   <th scope="col">Naam</th>
	       <th scope="col">Prijs</th>
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
	     	 <td scope="row"><?=  $row['prijs'] ?></td>
	   	 </tr>

	   	 <?php
	   	 }
	   	 echo "</table>";
	   	 ?>
	  </tbody>
	</table>

		<?php

$sth = $pdo->prepare('SELECT * FROM gerechten');

$sth->execute();

?>

	<table class="table">
	  <thead>
	   	 <tr>
	   	   <th scope="col">Gerechten</th>
	   	   <th scope="col">Naam</th>
	       <th scope="col">Prijs</th>
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
	     	 <td scope="row"><?=  $row['prijs'] ?></td>
	   	 </tr>

	   	 <?php
	   	 }
	   	 echo "</table>";
	   	 ?>
	  </tbody>
	</table>

</body>
</html>