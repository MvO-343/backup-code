<?php

// try
// {
// 	$pdo = new PDO ("mysql:host=localhost;dbname=bowlingbaan", 'root', '');
// }
// catch(PDOException $e)
// {
// 	echo $e->getMessage();
// }
//maakt connectie met database
function connectie(){
	try{
		$pdo = new PDO ("mysql:host=localhost;dbname=bowlingbaan", 'root', '');
		return $pdo;
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
}

function rekenen($getal1, $getal2){
	$uitkomst = $getal1 + $getal2;
	return $uitkomst;
}

?>