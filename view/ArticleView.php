<?php 
    $title = "Article";
    $couleurEntete = "bg-third";
    $texteEntete = "Breaking News";
    $couleurTexteEntete = "text-danger";

    if(!isset($_SESSION["idArticle"]))
    {
        // redirection si pas d'article selectionner
        header("location:blog");
        exit();
    }

    // mise en cache du contenu de la page pour la creation de la variable du template
    ob_start();

    require_once("./model/ArticleManager.php");
    $_articleManager    = new ArticleManager();

?>

<section>
    <div class="p-3 bg-fourth">
        <div class="bg-light p-4 rounded-5">
            <!-- carousel -->
            <div id="ImgArticle" class="carousel slide carousel-fade mt-2" data-bs-ride="carousel">

                <!-- Indicateurs -->
                <ul class="carousel-indicators">
                    <?php
                        
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
        </div>
    </div>
</section>
<section>
    <div class="p-3 bg-fourth">
        <div class="p-6 bg-light rounded-5">
            <?php
                // Article
                while($detail = $_article->fetch())
                {
                    ?>
                        <p class="p-4 display-1 fw-bold"><?=  htmlspecialchars_decode($detail["title"]) ?></p>
                        <p class="p-1 lead "><?=  htmlspecialchars_decode($detail["description"]) ?></p>
                        <p class="p-1"><?= htmlspecialchars_decode($detail["content"]) ?></p>

                    <?php
                }
            ?>
        </div>
    </div>
</section>
<section>
    <div class="p-3 bg-fourth">
        <div class="p-6 bg-light rounded-5">
            <?php
                // commentaire
                if(!isset($_SESSION["connect"]))
                {
                    ?>
                        <a href="connection">Vous devez vous connecter pour pouvoir laisser un commentaire</a>
                    <?php
                }
                else
                {
                    ?>
                        <form class="p-2" method="post" action="./addComment">
                            <p>
                                <label for="comment" class="form-label">Commentaire :</label>
                                <textarea class="form-control" name="comment" id="comment" rows="4" required></textarea>
                            </p>
                            <p>
                                <button type="submit" class="btn btn-secondary mb-2">Poster</button>
                            </p>
                        </form>
                    <?php
                }
            ?>
            <hr>
                <?php

                    $_comments = $_articleManager->getListeComment($_SESSION["idArticle"]);

                    while ($com = $_comments->fetch()) 
                    {
                        ?>
                            <p class="fw-bold mb-1"><?= $com["first_name"]; ?> - <?= $com["last_name"] ?> : </p>
                            <p class="mt-1 text-justify text-break"><?= htmlspecialchars_decode($com["content"]) ?></p>
                            <br>
                        <?php
                    }
                ?>
        </div>
    </div>
</section>

<?php 
    $content = ob_get_clean();

    require("template.php");
?>