<?php
    $title = "Accueil";

    ob_start();
?>

<section class="container">
        
    <h1>Bienvenue sur mon site MVC</h1>
    <p>Voici la liste des utilisateurs :</p>

    <?php
        
        while($utilisateur = $requete->fetch()) {
    
    ?>
        <p><b><?= $utilisateur['pseudo'] ?> : <?= $utilisateur['email'] ?></p>
    <?php
        }
    ?>

</section>

<?php
    $content = ob_get_clean();

    require('base.php');
?>