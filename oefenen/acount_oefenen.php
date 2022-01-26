<!DOCTYPE html>
<html>
<head>
	<title>Acount aanmaken.</title>
</head>
<body>
<form>
	<p>Naam:<input type="text" name="Naam"></p>
	<p>Wachtwoord:<input type="text" name="Wachtwoord"></p>
	<input type="submit" name="Sign up!"></p>
	<?php
	//verbinding maken met database
	$verbinding = new PDO("mysql:host=localhost;dbname=oefenen", "root", "");
	if (isset($_GET['Naam'])&isset($_GET['Wachtwoord'])) {
	//INSERT INTO `opnieuw` (`Naam`, `Wachtwoord`) VALUES ('adwawd', 'awdad');
	$sth = $verbinding->prepare("INSERT INTO `opnieuw` (`Naam`, `Wachtwoord`) VALUES ('".$_GET['Naam']."', '".$_GET['Wachtwoord']."');");
	$sth->execute();
	}
	else {
		$_GET['Naam']=null;
		$_GET['Wachtwoord']=null;
	} 
	?>
	<a href="acount_weergeven.php">Acounts weergeven.</a>
</form>

</body>
</html>