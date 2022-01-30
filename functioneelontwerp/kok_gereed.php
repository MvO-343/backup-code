<?php

require 'connectie.php';

$id_gerechten = $_GET['id_gerechten'];
$id_reservering = $_GET['id_reservering'];

$parameters = array(':reservering_id'=>$id_reservering,
					':gerechten_id'=>$id_gerechten);

$sth = $pdo->prepare('UPDATE
					    `bestelling_gerechten`
					SET
					    `gereed` = 1
					WHERE
					    `bestelling_gerechten`.`reservering_id` = :reservering_id 
					AND `bestelling_gerechten`.`gerechten_id` = :gerechten_id');

$sth->execute($parameters);

header("Refresh:0.1; URL=bestelling_kok.php");

?>