<?php 
    $title = "Article";
    $couleurEntete = "bg-third";
    $texteEntete = "BREAKING NEWS";
    $couleurTexteEntete = "text-danger";

    // mise en cache du contenu de la page pour la creation de la variable du template
    ob_start();
?>

<section>
    <h1>Oups</h1>
</section>

<?php 
    $content = ob_get_clean();

    require("template.php");
?>