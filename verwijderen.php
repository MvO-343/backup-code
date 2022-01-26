<?php
//Connectie naar database
try
	{
		$pdo = new PDO("mysql:host=localhost;dbname=fastfood", 'root', '');
	}
catch(PDOException $e)
	{
		echo $e->getMessage();
	}

		$parameters = array(':id' => $_GET['id']);
		//bereid de update van de waarden van t formulier in de database voor
		$sth = $pdo->prepare('DELETE FROM snacks WHERE id = :id');
		//Update de gegevens in de database
		$sth->execute($parameters);

		header("location:weergeven.php");
?>