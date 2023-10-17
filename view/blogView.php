<?php 
    $title = "Blog";
    $couleurEntete = "bg-third";
    $texteEntete = "Breaking News";
    $couleurTexteEntete = "text-danger";

    // mise en cache du contenu de la page pour la creation de la variable du template
    ob_start();
?>

<section class="container bg-fourth">
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
                require_once("./model/CategorieManager.php");

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

    <!-- liste des articles -->
    <div class="row">

        <?php
        require_once("./model/ArticleManager.php");
        
        $_categorie      = "Tous";
        $_articleManager = new ArticleManager();

        if (isset($_GET["categorie"]))
        {
            $_categorie = htmlspecialchars($_GET["categorie"]);
        }

        $_liste = $_articleManager->getListeArticle($_categorie);

        while($_resultat = $_liste->fetch())
        {
            // création des cartes
            ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card m-3"> 
                        <?php
                            // recuperation image
                            $resultat = $_articleManager->getImageCardArticle($_resultat["id"]);
                            if( $resultat != null){
                                echo '<img src="./public/Assets/'.$resultat.'" alt="image" class="card-img-top" />';
                            }
                        ?>
                        <div class="card-body" style="min-height: 110px">
                            <h5><?= htmlspecialchars_decode($_resultat["description"]) ?></h5>
                        </div>
                        <div class="card-footer">
                            <form method="post" action="article">
                                <input type="hidden" id="postId" name="postId" value="<?= $_resultat["id"] ?>" />
                                <button type="submit" class="btn w-100 btn-outline-secondary">Détail</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
        }

        ?>
    </div>

        

   

</section>

<?php 
    $content = ob_get_clean();

    require("template.php");
?>