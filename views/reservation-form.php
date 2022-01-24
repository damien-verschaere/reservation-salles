<?php
session_start();

require "requires/header2.php";
require_once "../class/Reservations.php";
?>
<main class="form">
    <h2>Reservez votre momment detente</h2>
    <div class="carre">
    <form action="reservation-form.php" method="post">
        <input type="text" name="titre" placeholder="TITRE">
        <textarea name="description" cols="30" rows="10"></textarea>
        <label for="jour">
           <input type="datetime-local" name="date" step="3600">
        </label>
        <input type="submit" name="reservation">
        <?php if (isset($_POST['reservation'])) {
            $resa=new Reservation;
            $resa->reservation($_POST['titre'],$_POST['description'],$_POST['date'],$_POST['date'],$_SESSION['user']['id']);}?>
    </form>
    </div>
</main>
<?php
require "requires/footer2.php";
?>