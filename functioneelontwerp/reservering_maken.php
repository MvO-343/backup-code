<!DOCTYPE html>
<html>
<head>
	<title>Reservering maken</title>
	<?php

	require 'bootstrap.php';
	require 'nav.php';
	require 'connectie.php';
	
	?>
</head>
<body>

	<?php
	if (isset($_GET['naam'])&isset($_GET['email']&isset($_GET['telefoonnummer']))) {	
	$parameters = array(':naam'=>$_POST['naam'],
					':email'=>$_POST['email'],
					':telefoonnummer'=>$_POST['telefoonnummer']);
	$sth = $pdo->prepare('INSERT INTO klant(
						    naam,
						    email,
						    telefoonnummer
						)
						VALUES(
						    :naam,
						    :email,
						    :telefoonnummer
						');

$sth->execute($parameters);
}
?>
	?>

	<form method="POST">
	<div class="form-group">
    <label for="naam">Naam</label>
    <input class="form-control" name="naam" type="text" required>
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="telefoonnummer">telefoonnummer</label>
    <input class="form-control" name="telefoonnummer" type="tel" >
  </div>
  <div class="form-group">
    <label for="aantal_personen">aantal personen</label>
    <input class="form-control" naam="aantal_personen" type="tel">
  </div>
  <div class="form-group">
    <label for="datum_tijd">Datum en Tijd</label>
    <input class="form-control" naam="datum_tijd" type="datetime-local">
  </div>
  <button type="submit" name="send "class="btn btn-primary">Submit</button>
</form>

</body>
</html>