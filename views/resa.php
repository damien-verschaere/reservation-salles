<?php

session_start();
// var_dump($_SESSION['user']['id']);

require_once "../class/Reservations.php";
$resaparid = new Reservation;
if (!isset($_GET['id'])) {
    header('location : ../index.php');
}
$resajournee= $resaparid->getId($_GET['id']);
var_dump($resaparid->getId($_GET['id']))
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <title>Document</title>
</head>
<body>
<?php require "requires/header2.php";  ?>

    <main>
      <h1><?= $resajournee['titre']?></h1>
      <p><?= $resajournee['description']?></p>  
      <p><?= $resajournee['debut']?></p>
      <p><?= $resajournee['fin']?></p>
       
    </main>

<?php
require "requires/footer2.php";
?>
</body>
</html>