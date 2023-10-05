<?php 
    $title = "Accueil";

    // mise en cache du contenu de la page pour la creation de la variable du template
    ob_start();
?>

<section class="container">
    <h1 class="text-warning">Accueil</h1>
</section>

<?php 
    $content = ob_get_clean();

    require("template.php");
?>