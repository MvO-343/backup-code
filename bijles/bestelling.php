
<?php
ob_start();
session_start();


//Bestelgegevens aanmaken
$parameters = array(':datum' => data("Y-m-d"),
					':tijd' => date("H:i:s"),
					':gebruikers_id' => $_SESSION['user_id']);

$sth = $pdo->prepare('INSERT INTO bestelingen(besteling_id, datum, omschrijving, tijd, gebruikers_id) VALUES ( :besteling_id, :datum, :tijd, :gebruikers_id)');

$sth->execute($parameters);

$BestelID = $sth->LastInsertId();

$snack = array(2, "rundvleeskroket");

try
{
	$pdo = new PDO("mysql:host=localhost;dbname=fastfood", 'root', '');
}
catch(PDOException $e)
{
	echo $e->getMessage();
}

$snack = array(2, "gehaktbal" ,2);
$snack2 = array(3, "kipnuggets", 1);
$snack3 = array(4, "bamischijf", 3);

$snacks = array($snack,$snack2,$snack3);


$parameters = array(
    ':gebruikersid' => $_SESSION['user_id'],
    ':datum' => date("Y-m-d"),
    ':tijd' => date("H:i:s")
);
$sth = $pdo->prepare("INSERT INTO bestellingen(gebruikers_id, datum, tijd) VALUES (:gebruikersid,:datum,:tijd)");
$sth->execute($parameters);

$bestelid = $pdo->lastInsertId();


for ($i=0; $i < count($snacks); $i++) {
    $parameters = array(
        ':bestelid' => $bestelid,
        ':snackid' => $snacks[$i][0],
        ':aantal' => $snacks[$i][2]
    );
    $sth = $pdo->prepare("INSERT INTO bestellingen_snacks(bestellingid, snackid, aantal) VALUES (:bestelid,:snackid,:aantal)");
    $sth->execute($parameters);

}


$_SESSION['winkelwagen'] = $snacks;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Besteling</title>
</head>
<body>

</body>
</html>