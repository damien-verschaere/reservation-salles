<?php 


require "requires/header2.php";
require_once "../class/Utilisateurs.php";

if (isset($_POST["sub"])){
    $user = new Utilisateur();
    $user->register($_POST['login'],$_POST['password']); 
     
}


?>

<main>
    <h2>INSCRIVEZ VOUS</h2>
    <div class=carre >
    <form action="inscription.php" method="post">
        <input type="text" name="login" placeholder="login">
        <input type="password" name="password" placeholder="password">
        <input type="password" name="Vpass" placeholder="verification de password">
        <input type="submit" name="sub">
    </form>
    </div>
</main>