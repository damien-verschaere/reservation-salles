<?php
session_start();
require "requires/header2.php";
require_once "../class/Utilisateurs.php"
?>
<main>
    <div class="carre">
    <form action="planning.php" method="post">
        <input type="text" name="titre" placeholder="TITRE">
        <textarea name="description" cols="30" rows="10"></textarea>
        <label for="jour">choisir un jour
            <select name="jour">
                <option value="">--Please choose an option--</option>
                <option value="8">lundi</option>
                <option value="9">mardi</option>
                <option value="10">mercredi</option>
                <option value="11">jeudi</option>
                <option value="12">vendredi</option>
                <option value="13">samedi</option>
                <option value="14">dimanche</option>
            </select>
        </label>
        <label class="resa" for="horraire"> chosisez un horraire
            <select name="horraire">
                <option value="">--Please choose an option--</option>
                <option value="8">8h-9h</option>
                <option value="9">9h-10h</option>
                <option value="10">10h-11h</option>
                <option value="11">11h-12h</option>
                <option value="12">12h-13h</option>
                <option value="13">13h-14h</option>
                <option value="14">14h-15h</option>
                <option value="15">15h-16h</option>
                <option value="16">16h-17h</option>
                <option value="17">17h-18h</option>
                <option value="18">18h-19h</option>
            </select>
        </label>
        <input type="submit">
    </form>
    </div>
</main>
<?php
require "requires/footer2.php";
?>