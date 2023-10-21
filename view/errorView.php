<?php 
    $title = "Erreur";
    $couleurEntete = "bg-primary";
    $texteEntete = "Erreur";
    $couleurTexteEntete = "text-white";

    // mise en cache du contenu de la page pour la creation de la variable du template
    ob_start();
?>

<section>
    <h1>Oups</h1>
    <p><?= $Error?></p>
</section>

<?php 
    $content = ob_get_clean();

    require("template.php");
?>