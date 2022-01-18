<?php

session_start();
var_dump($_SESSION['user']['id']);
require "requires/header2.php";
require_once "../class/Reservations.php";
$resa=new Reservation;



?>
<main>

<table>
    <thead>
        <tr>
            <th><?php $resa->affichage_resa()?></th>
           
        </tr>
    </thead>
    <tbody>

    </tbody>

</table>
</main>
<?php
require "requires/footer2.php";
?>