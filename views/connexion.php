<?php 

session_start();
require_once "../class/Utilisateurs.php";
require "requires/header2.php";
?>


<main class="form">
    <h2>CONNECTEZ VOUS</h2>
    <div class=carre >
    <form action="connexion.php" method="post">
        <input type="text" name="login" placeholder="login">
        <input type="password" name="password" placeholder="password">
        <input type="submit" name="connexion" value="CONNEXION">
        <?php if (isset($_POST['connexion'])) {
            $utilisateur=new Utilisateur();
            $utilisateur->connexion_user($_POST['login'],$_POST['password']);
    
        }?>
    </form>
    </div>
</main>
<?php
require "requires/footer2.php";
?>
