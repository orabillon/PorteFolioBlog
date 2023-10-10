<?php 
    $title = "Blog";
    $couleurEntete = "bg-third";
    $texteEntete = "BREAKING NEWS";
    $couleurTexteEntete = "text-danger";

    // mise en cache du contenu de la page pour la creation de la variable du template
    ob_start();
?>

<section class="container">
    <h1 class="text-primary">
        Articles
        <span class="text-capitalize">
            <?php
            if (isset($_GET["categorie"]))
            {
                echo  " - ".$_GET["categorie"];
            }
            ?>
        </span>
    </h1>
        
    <!-- liste déroulante -->
    <div class="dropdown m-3">
        <!-- Bouton -->
        <button id="filtreCategorie" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
            filtrer par catégorie
        </button>

        <!-- Les éléments du menu -->
        <ul class="dropdown-menu" aria-labbeledby="filtreCategorie">

        <li><a class="dropdown-item" href="blog">Tous</a></li>

            <?php
                require_once("./model/categorieManager.php");

                // recuperation de toute les categorie 

                $_categorieManager = new CategorieManager();
                $liste = $_categorieManager -> getListeCategorie();

                while($_cate = $liste->fetch())
                {
                    ?>
                        <li><a class="dropdown-item" href="blog-<?= $_cate["url"] ?>"><?= $_cate["categorie"]?></a></li>
                    <?php
                }

            ?>
        </ul>
    </div>

    <?php
        
    ?>

</section>

<?php 
    $content = ob_get_clean();

    require("template.php");
?>