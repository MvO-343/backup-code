<?php

try
{
	$pdo = new PDO ("mysql:host=localhost;dbname=bowlingbaan", 'root', '');
}
catch(PDOException $e)
{
	echo $e->getMessage();
}
// maakt connectie met database
// function Connectie(){
// 	try{
// 		$pdo = new PDO ("mysql:host=localhost;dbname=bowlingbaan", 'root', '');
// 		return $pdo;
// 	}
// 	catch(PDOException $e){
// 		echo $e->getMessage();
// 	}
// }

function Rekenen($getal1, $getal2){
	$uitkomst = $getal1 + $getal2;
	return $uitkomst;
}

?>