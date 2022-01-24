<?php

session_start();
require_once "../class/Utilisateurs.php";
if (isset($_POST['update'])) {
    $user=new Utilisateur;
    $user->modifier_profil($_POST['login'],$_POST['password']);
}

require "requires/header2.php";


?>
<main class="form">
    <h2>VOTRE PROFIL</h2>
    <div class="carre">
    <form action="profil.php" method="post">
    <input type="text" name="login" placeholder="LOGIN">
    <input type="password" name="password" placeholder="PASSWORD">
    <input type="submit" value="MODIFIER" name="update">
    </div>


    </form>
</main>
<?php
    require "requires/footer2.php"
?>