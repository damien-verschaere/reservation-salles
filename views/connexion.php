<?php 

session_start();
require "requires/header2.php";
require_once "../class/Utilisateurs.php";
if (isset($_POST['connexion'])) {
    $utilisateur=new Utilisateur();
    $utilisateur->connexion_user($_POST['login'],$_POST['password']);
    
}
?>

<main>
    <h2>CONNECTEZ VOUS</h2>
    <div class=carre >
    <form action="connexion.php" method="post">
        <label for="login">
           login <input type="text" name="login" placeholder="login">
        </label>
        <label for="password">
           password <input type="password" name="password" placeholder="password">
        </label>
        <input type="submit" name="connexion" value="CONNEXION">
    </form>
    </div>
</main>
<?php 

    require "requires/footer2.php";

?>