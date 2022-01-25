<!DOCTYPE html>
<html>
  <head>
	   <title>Schoenpaar</title>

	   <?php
	   require("nav.php"); 
	   require("bootstrap.php"); 
	   ?>

  </head>

  <body>
    <h1>Schoenparen.</h1>

    <?php

    include 'connection.php';

    
    $sth = $pdo->prepare('SELECT * FROM schoenpaar');

    $sth->execute();
    ?>

    <table class="table">
	     <thead>
        <tr>
         <th scope="col">Schoenpaar</th>
         <th scope="col">Maat</th>
         <th scope="col">Prijs</th>
        </tr>
      </thead>

      <?php

      while ($row = $sth->fetch()) 
      {

      ?>

     <tbody>
        <tr>
          <th scope="row"><?= $row['id']; ?></th>
          <td scope="row"><?= $row['maat']; ?></td>
          <td scope="row"><?= $row['prijs']; ?></td>
        </tr>
     </tbody>
       
      <?php	
      }
      ?>

      
    </table>
  </body>
</html>