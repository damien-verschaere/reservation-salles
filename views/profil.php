<?php

session_start();
require_once "../class/Utilisateurs.php";
if (isset($_POST['update'])) {
    $user=new Utilisateur;
    $user->modifier_profil($_POST['login'],$_POST['password']);
}

require "requires/header2.php";

var_dump($_SESSION['user']);
?>
<main>
    <h2>VOTRE PROFIL</h2>
    <div class="carre">
    <form action="profil.php" method="post">
    <input type="text" name="login">
    <input type="password" name="password">
    <input type="submit" value="MODIFIER" name="update">
    </div>


    </form>
</main>
<?php
    require "requires/footer2.php"
?>