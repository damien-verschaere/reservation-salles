<?php

session_start();
var_dump($_SESSION['user']['id']);
require "requires/header2.php";
require_once "../class/Reservations.php";
$resa=new Reservation;



?>
<main>
<?php $resa->affichage_resa()?>
<table>
    <thead>
        <tr>
            <th>lundi</th>
            <th>mardi</th>
            <th>mercredi</th>
            <th>jeudi</th>
            <th>vendredi</th>
        </tr>
    </thead>
    <tbody> <tr><td>row 1, cell 1</td><td>row 1, cell 2</td></tr> <tr><td>row 2, cell 1</td><td>row 2, cell 2</td></tr> <tr><td>row 3, cell 1</td><td>row 3, cell 2</td></tr> <tr><td>row 4, cell 1</td><td>row 4, cell 2</td></tr> <tr><td>row 5, cell 1</td><td>row 5, cell 2</td></tr> <tr><td>row 6, cell 1</td><td>row 6, cell 2</td></tr> <tr><td>row 7, cell 1</td><td>row 7, cell 2</td></tr> <tr><td>row 8, cell 1</td><td>row 8, cell 2</td></tr> </tbody>

Source: https://prograide.com/pregunta/6761/tableau-html-avec-en-ttes-fixes
</table>
</main>
<?php
require "requires/footer2.php";
?>