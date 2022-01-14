<?php
    session_start();
    require "views/requires/header.php";
    require_once "class/Utilisateurs.php";
    $user=new Utilisateur;
   var_dump($_SESSION['user']['login'])

 
?>
    <main>
      
        <h2>STRESSER VENEZ VOUS RELACHEZ !</h2>
        <div class=video>
        <iframe width="900" height="500" src="https://www.youtube.com/embed/9gij13tFzt4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <form action="index.php" method="post">
            <input type="submit" value="deco" name="deco">
        </form>
    </main>
<?php 
    require "views/requires/footer.php"
?>