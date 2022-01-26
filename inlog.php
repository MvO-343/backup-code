<?php
ob_start();
session_start();

$Message = NULL;


include "design.php";


try
	{
		$pdo = new PDO("mysql:host=localhost;dbname=fastfood;","root","");
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}

if(isset($_POST["Send"]))
{
	$parameters = array(":email" => $_POST["email"]);
	$sth = $pdo->prepare('SELECT * FROM gebruikers WHERE email = :email');

	$sth->execute($parameters);	
		
		
	// controleren of de username voorkomt in de DB
	if ($sth->rowCount() == 1) 
	{
		// Variabelen inlezen uit query
		$row = $sth->fetch();

					
			
			// paswoord hashen met de unieke Salt uit de DB
			$password = hash('sha512', $_POST['wachtwoord'] . $row['salt']);

			// controleren of het paswoord overeenkomt met het paswoord uit de DB
			if ($row['wachtwoord'] == $password) 
			{
				// vraagt de user agent op (later nodig)
				$user_browser = $_SERVER['HTTP_USER_AGENT'];


				//Alle valide van de gebruiker worden ingevoerd zodat de gebruiker ingelogd is
				//zet id email level in de sessie die blijft 30 min 
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['level'] = $row['level'];
				$_SESSION['login_string'] = hash('sha512',
						  $password . $user_browser);
				
				// Login successful.
				$Message = "u bent ingelogd";

				header('Refresh:2; URL = weergeven.php');
			 } 
			 else 
			 {
				// password incorrect
				$Message = "het paswoord is incorrect";
			 }
		}
		else
		{
			// username bestaat niet
			$Message ="De gebruikersnaam is niet gevonden";
		}
}
?>
<title>Inloggen</title>
<ul>
  <li><a href="index.php">Home</a></li>
  <li><a class="active" href="inlog.php">Inlog</a></li>
  <li><a href="registratie.php">Registreer</a></li>
  <li style="float:right"><a href="#">Mandje</a></li>
</ul>

<h1>Inloggen</h1>
	<?php echo '<br />'.$Message.'<br />';?>
	<form name="InlogFormulier" action="" method="post">
		<label for="email">Inlognaam:</label>
		<input type="text" id="Email" name="email" />
		<br />
		<label for="wachtwoord">Wachtwoord:</label>
		<input type="password" id="Password" name="wachtwoord" />
		<br />		
		<input type="submit" name="Send" value="Log in!" />
	</form>

	<p>Nog geen account registreer hier: <a href="registratie.php">Registreer!</a></p><br>