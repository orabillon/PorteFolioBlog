<?php 

    $title = "Accueil";
    $couleurEntete = "bg-secondary";
    $texteEntete = "Connexion";
    $couleurTexteEntete = "text-danger";

    // mise en cache du contenu de la page pour la creation de la variable du template
    ob_start();
?>

<section class="container bg-fifth">
   <h1>compte</h1>
</section>

<?php 
    $content = ob_get_clean();

    require("template.php");
?>