<?php
    session_start();
    require "views/requires/header.php";
    require_once "class/Utilisateurs.php";
    $user=new Utilisateur;
?>
    <main>

        <article class="accueil">
            <h2>Presentation</h2>
            <img src="https://ressources.spaetc.fr/files/soins/retina/2015/06/15/caisson-gros-plan-6335.jpg" alt="image bain isolation senssorielle">
            <p>venez vous detendre dans une de nos cabines d'isolations pour un moment 
                de detente et de silence.Dans un monde tous les jours plus bruyants ce plaisir ultime ou vous etes seul(e) pour une heure .  </p>
        </article>
        
    </main>
    <section class="presse">
            <h2>Les bienfaits</h2>
            <p>
                Comme dans la mer Morte, l’eau chargée en sel d’Epsom permet de ne plus ressentir le poids de son corps,
                ce qui soulage instantanément les tensions musculaires ou articulaires.
                Pour les femmes enceintes qui souffrent souvent du dos, cette pause en apesanteur est particulièrement salutaire.
                Certaines personnes atteintes de fibromyalgie y trouvent aussi du réconfort.
            </p>
        </section>
<?php 
    require "views/requires/footer.php"
?>