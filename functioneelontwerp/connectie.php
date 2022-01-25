<?php

try{
		$pdo = new PDO("mysql:host=localhost;dbname=functioneelontwerp", 'root', '');
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}

?>