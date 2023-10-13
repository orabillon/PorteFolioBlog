<?php 
    $title = "Liste projet";
    $couleurEntete = "bg-primary";
    $texteEntete = "Mes Projets";
    $couleurTexteEntete = "text-white";

    // mise en cache du contenu de la page pour la creation de la variable du template
    ob_start();
?>

<section>
    <h1>Projets</h1>
  
</section>

<?php 
    $content = ob_get_clean();

    require("template.php");
?>