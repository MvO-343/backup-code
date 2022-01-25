<!DOCTYPE html>
<html>
<head>
	<title>alle acounts</title>
</head>
<body>
	<form>
		<?php
		//verbinding maken met database
		$verbinding = new PDO("mysql:host=localhost;dbname=oefenen", "root", "");
		//SELECT `Naam`, `Wachtwoord` FROM `opnieuw` WHERE 1
		$sth = $verbinding->prepare("SELECT `Naam`, `Wachtwoord` FROM `opnieuw` WHERE 1");
		$sth->execute();

		while ($row = $sth->fetch()) {
			echo "<p>".$row['Naam']." , ".$row['Wachtwoord']." <a href=\"acount_verwijderen.php?Naam=".$row['Naam']."\">verwijder</a> , <a href=\"acount_updaten.php?Naam=".$row['Naam']."&Wachtwoord=".$row['Wachtwoord']."\">updaten</a></p>";
		}
		?>
		<a href="acount_oefenen.php">Acounts Toevoegen.</a>
	</form>
</body>
</html>