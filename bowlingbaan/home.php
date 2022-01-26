<!DOCTYPE html>
<html>
<head>
	<title>Bowlingbaan</title>
	

	<?php 
	require("nav.php"); 
	require("bootstrap.php"); 
	require("connection.php"); 
	?>
	
</head>
<body>

	<h1>Home pagina</h1>

<?php

	$som = rekenen("1", "2");

	echo $som;

?>

</body>
</html>