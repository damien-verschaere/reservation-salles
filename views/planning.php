<?php

session_start();
// var_dump($_SESSION['user']['id']);

require_once "../class/Reservations.php";
require_once "../class/Calendrier.php";
$resa=new Reservation;
$calendrier=new Calendrier($_GET['month'] ,$_GET['year'] );
$jour= $calendrier->getPremierjour()->modify('last monday');


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
        <div>
            <h1><?= $calendrier->toString()?> </h1>
            <a href="plannning.php?month=<?= $calendrier->previousMois()->_month;?>&year=<?= $calendrier->previousMois()->_year; ?>">&lt;</a>
            <a href="plannning.php?month=<?= $calendrier->nextMois()->_month;?>&year=<?= $calendrier->nextMois()->_year; ?>">&gt;</a>
        </div>
        <table class="calendar calendar__exception<?= $calendrier->getSemaines();?>semaines">
        <?php for ($i=0; $i <$calendrier->getSemaines() ; $i++) : ?>
            <tr>
                <?php foreach ($calendrier->days as $dateJour=> $day) : 
                $date= (clone $jour)->modify("+" .($dateJour + $i * 7) ." days")
                ?>
        
                <td>
                    <?php if ($i === 0) : ?>
                    <div class="joursemaine"> <?= $day;?></div>
                    <?php endif ?>
                    <?=$date ->format('d')?>
                </td>
                <?php endforeach;?> 
            </tr>
    
            <?php endfor;?>
        </table>
</main>

<?php
require "requires/footer2.php";
?>
</body>
</html>