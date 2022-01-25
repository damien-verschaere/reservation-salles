<?php

session_start();
// var_dump($_SESSION['user']['id']);

require_once "../class/Reservations.php";
$resaparid = new Reservation;
if (!isset($_GET['id'])) {
    header('location : ../index.php');
}
$resajournee= $resaparid->getId($_GET['id']);
require "requires/header2.php";  
?>



    <main class="afficheresa">  
      <div class="carre2">  
        <h2><?= $resajournee['titre']?></h2>
        <p><?= $resajournee['description']?></p>  
        <p><?= $resajournee['debut']?></p>
        <p><?= $resajournee['fin']?></p>
      </div>
    </main>

<?php
require "requires/footer2.php";
?>
