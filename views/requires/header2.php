<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <title>Detente Bath</title>
</head>
<body>
    
    <header>
      <nav >
      <a href="../index.php"><h1>Detente Bath</h1></a>
        <ul>
        <?php if(empty($_SESSION['user']['id'])) :  ?>
          <a href="inscription.php"><li>Inscription</li></a>
          <a href="connexion.php"><li>Connexion</li></a>
          <?php else  : ?>
          <a href="reservation-form.php"><li>Reservation</li></a>
         <a href="profil.php"><li>profil</li></a> 
         <a href="planning.php"><li>planning</li></a> 
          
          
         <?php endif; ?>
      </ul>
      </nav>
    </header>