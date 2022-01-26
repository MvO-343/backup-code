<!DOCTYPE html>
<html>
<head>
	<title>Registreren</title>
</head>
<body>

<?php
include "design.php";

try
{
	$pdo = new PDO("mysql:host=localhost;dbname=fastfood", 'root', '');
}
catch(PDOException $e)
{
	echo $e->getMessage();
}

if (isset($_POST['registratie']))
{

	//maak unieke salt
	$Salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

	//hash passwoord met de Salt
	$Password = hash('sha512', $_POST['wachtwoord']. $Salt);

$parameters = array(':email' => $_POST['email'],
					':naam' => $_POST['naam'],
					':adres' => $_POST['adres'],
					':postcode' => $_POST['postcode'],
					':plaats' => $_POST['plaats'],
					':salt' => $Salt,
					':wachtwoord' => $Password,
					':level' => 1);

//'INSERT INTO gebruikers ( id , email , naam , adres , postcode ,  plaats ,  salt ,  wachtwoord ,  level ) VALUES ( :id , :email,  :naam , :adres , :postcode , :plaats , :salt , :wachtwoord , :level')
$sth = $pdo->prepare('INSERT INTO gebruikers (email, naam, adres, postcode, plaats, salt, wachtwoord, level) VALUES (:email, :naam,:adres,:postcode,:plaats,:salt,:wachtwoord,:level)');

$sth->execute($parameters);
}

?>

<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="inlog.php">Inlog</a></li>
  <li><a class="active" href="registratie.php">Registreer</a></li>
  <li style="float:right"><a href="#">Mandje</a></li>
</ul>

<form action="" method="POST">
    <h1>Registratie</h1>

    <label for="email"><b>Email</b></label><br>
    <input type="text" placeholder="Email" name="email"><br>

    <label for="naam"><b>Volledige Naam</b></label><br>
    <input type="text" placeholder="Volledige Naam" name="naam"><br>

    <label for="adres"><b>Adres</b></label><br>
    <input type="text" placeholder="Adres" name="adres"><br>

    <label for="postcode"><b>Postcode</b></label><br>
    <input type="text" placeholder="Postcode" name="postcode"><br>

    <label for="plaats"><b>Plaats</b></label><br>
    <input type="text" placeholder="Plaats" name="plaats"><br>

    <label for="wachtwoord"><b>Wachtwoord</b></label><br>
    <input type="password" placeholder="Wachtwoord" name="wachtwoord"><br><br>

    <button type="submit" name="registratie" value="registratie">Registratie</button><br><br>
</form>

<a href="inlog.php">Login!</a><br>

</body>
</html>