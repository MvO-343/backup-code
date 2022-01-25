<?php
//verbinding maken met database
$verbinding = new PDO("mysql:host=localhost;dbname=oefenen", "root", "");
//"DELETE FROM `opnieuw` WHERE `opnieuw`.`Naam` = \'diesel\'"
$sth = $verbinding->prepare("DELETE FROM `opnieuw` WHERE `opnieuw`.`Naam` =\"".$_GET['Naam']."\"");
$sth->execute();

header("Refresh: 0.1; URL=http://localhost/oefenen/acount_weergeven.php")
?>