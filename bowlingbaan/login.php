<!DOCTYPE html>

<?php 
	require("bootstrap.php"); 
    require("connection.php");

if(isset($_POST['Send'])){

    $email = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];

    $sth = $pdo->prepare("SELECT * FROM `medewerker`");
    $sth->execute();
    while($row = $sth->fetch()){

        if($email == $row['email'] && password_verify($wachtwoord, $row['wachtwoord'])){
            $_SESSION['medewerker_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['level'] = $row['level'];
            header('Refresh:1; URL = home.php');
            exit();
            }
    }
    echo "Gebruikersnaam of wachtwoord is verkeerd, probeer het opnieuw.";

}

?>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Inlog</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
 <div class="d-flex justify-content-center">
<main class="form-signin">
 
  <form style="width: 400px" method="post" >
  	<input type="hidden" name="Send">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="Email" placeholder="name@example.com" name="email">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="Password" placeholder="Password" name="wachtwoord">
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" name="Send" type="submit">Sign in</button>
  </form>
</main>
</div>

    
  </body>
</html>