<!DOCTYPE html>
<html>
<head>
	<title>Acount Updaten</title>
</head>
<body>
	<form>
		<input type="hidden" name="Naam" value="<?php echo($_GET['Naam'])?>">
		<p>Nieuwe naam:<input type="text" name="NieuwNaam" value="<?php echo($_GET['Naam'])?>"></p>
		<p>Nieuwe wachtwoord:<input type="text" name="NieuwWachtwoord" value="<?php echo($_GET['Wachtwoord'])?>"></p>
		<input type="submit" name="verzenden" value="verzend">

		<?php
		//verbinding maken met database
		$verbinding = new PDO("mysql:host=localhost;dbname=oefenen", "root", "");


		if (isset($_GET['NieuwNaam'])&isset($_GET['NieuwWachtwoord'])) {
			//UPDATE `opnieuw` SET `Naam` = 'dwadawdaw', `Wachtwoord` = 'haha' WHERE `opnieuw`.`Naam` = 'adwawd';
			$sth = $verbinding->prepare("UPDATE `opnieuw` SET `Naam` = '".$_GET['NieuwNaam']."', `Wachtwoord` = '".$_GET['NieuwWachtwoord']."' WHERE `opnieuw`.`Naam` = '".$_GET['Naam']."';");
			$sth->execute();
		}
		
		if (!isset($_GET['verzenden'])) {
			$_GET['verzenden']=null;
		}

		elseif ($_GET['verzenden']="verzend") {
			header("Refresh: 0.1; URL=http://localhost/oefenen/acount_weergeven.php");
		}
		?>

		<a href="acount_weergeven.php">Terug?</a>
	</form>

</body>
</html>