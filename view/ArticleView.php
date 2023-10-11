<?php 
    $title = "Article";
    $couleurEntete = "bg-third";
    $texteEntete = "BREAKING NEWS";
    $couleurTexteEntete = "text-danger";

    if(!isset($_SESSION["idArticle"]))
    {
        // redirection si pas d'article selectionner
        header("location:blog");
        exit();
    }

    // mise en cache du contenu de la page pour la creation de la variable du template
    ob_start();
?>

<section>
    <!-- carousel -->
    <div id="ImgArticle" class="carousel slide carousel-fade mt-2" data-bs-ride="carousel">

        <!-- Indicateurs -->
        <ul class="carousel-indicators">
            <?php
                require_once("./model/ArticleManager.php");

                $_articleManager    = new ArticleManager();
                $_listeImage        = $_articleManager->getListeImagedArticle( $_SESSION["idArticle"]);
                $_article           = $_articleManager->getArticle($_SESSION["idArticle"]);

                $i = 0;

                while($_image = $_listeImage->fetch()){
                
                    ?>
                        <li data-bs-target="#ImgArticle" data-bs-slide-to="<?= $i ?>" <?php if($i == 0){echo 'class="active"';} ?>></li>
                    <?php

                    $i++;
                }
            ?> 
        </ul>

        <!-- Contenu du carousel -->
        <div class="carousel-inner">

        <?php
                require_once("./model/ArticleManager.php");

                $_articleManager    = new ArticleManager();
                $_listeImage        = $_articleManager->getListeImagedArticle($_SESSION["idArticle"]);

                $i = 0;

                while($_image = $_listeImage->fetch()){
                
                    ?>
                    <!-- Premier slide -->
                    <div class="carousel-item active" data-bs-interval="5000">
                        <img src="public/Assets/<?= $_image["image"]?>" class="w-100 d-block" alt="imageArticle">
                    </div>
                    <?php
                }
            ?> 

        </div>

        <!-- Controles -->
        <a class="carousel-control-prev" href="#ImgArticle" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="sr-only">Précédent</span>
        </a>
        <a class="carousel-control-next" href="#ImgArticle" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="sr-only">Suivant</span>
        </a>

    </div>

    <?php

        while($detail = $_article->fetch())
        {
            ?>
                <p class="p-4 display-1 fw-bold"><?=  htmlspecialchars_decode($detail["title"]) ?></p>
                <p class="p-1 lead "><?=  htmlspecialchars_decode($detail["description"]) ?></p>
                <p class="p-1"><?= htmlspecialchars_decode($detail["content"]) ?></p>

            <?php
        }
    ?>

</section>

<?php 
    $content = ob_get_clean();

    require("template.php");
?>