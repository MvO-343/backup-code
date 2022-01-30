<?php

require 'connectie.php';

$id_drinken = $_GET['id_drinken'];
$id_reservering = $_GET['id_reservering'];

$parameters = array(':reservering_id'=>$id_reservering,
					':drinken_id'=>$id_drinken);

$sth = $pdo->prepare('UPDATE
					    `bestelling_drinken`
					SET
					    `gereed` = 1
					WHERE
					    `bestelling_drinken`.`reservering_id` = :reservering_id 
					AND `bestelling_drinken`.`drinken_id` = :drinken_id');

$sth->execute($parameters);

header("Refresh:0.1; URL=bestelling_bediening.php");

?>