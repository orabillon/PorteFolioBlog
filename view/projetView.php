<?php 
    $title = "Projet";
    $couleurEntete = "bg-primary";
    $texteEntete = "Mes Projets";
    $couleurTexteEntete = "text-white";

    if(!isset($_SESSION["idProjet"]))
    {
        // redirection si pas d'article selectionner
        header("location:listeProjet");
        exit();
    }

    require_once("./model/ProjetManager.php");
    $_projetManager = new ProjetManager();
    

    // mise en cache du contenu de la page pour la creation de la variable du template
    ob_start();
?>

<?php
    // Afficher carouselle que si des image existe
    $_nb = $_projetManager->getNumberImages($_SESSION["idProjet"]);

    if ($_nb != 0)
    {
        ?>
            <section>
                <div class="p-3 bg-sixth">
                    <div class="bg-light p-4 rounded-5">
                        <!-- carousel -->
                        <div id="ImgProjet" class="carousel slide carousel-fade mt-2" data-bs-ride="carousel">

                            <!-- Indicateurs -->
                            <ul class="carousel-indicators">
                                <?php
                                    
                                    $_listeImage       = $_projetManager->getListeImagedProjet( $_SESSION["idProjet"]);
                                    

                                    $i = 0;

                                    while($_image = $_listeImage->fetch()){
                                    
                                        ?>
                                            <li data-bs-target="#ImgProjet" data-bs-slide-to="<?= $i ?>" <?php if($i == 0){echo 'class="active"';} ?>></li>
                                        <?php

                                        $i++;
                                    }
                                ?> 
                            </ul>

                            <!-- Contenu du carousel -->
                            <div class="carousel-inner">

                            <?php
                                    $_listeImage        = $_projetManager->getListeImagedProjet($_SESSION["idProjet"]);

                                    $i = 0;

                                    while($_image = $_listeImage->fetch()){
                                    
                                        ?>
                                            <!-- Premier slide -->
                                            <div class="carousel-item active" data-bs-interval="5000">
                                                <img src="public/Assets/<?= $_image["image"]?>" class="w-100 d-block" alt="imageProjet">
                                            </div>
                                        <?php
                                    }
                                ?> 

                            </div>

                            <!-- Controles -->
                            <a class="carousel-control-prev" href="#ImgProjet" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                                <span class="sr-only">Précédent</span>
                            </a>
                            <a class="carousel-control-next" href="#ImgProjet" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                                <span class="sr-only">Suivant</span>
                            </a>

                        </div>
                    </div>
                </div>
            </section>
        <?php 
    }
    ?>

<section>
    <div class="p-3 bg-sixth">
        <div class="p-6 bg-light rounded-5">
            <?php
                $_projet  = $_projetManager->getProjet($_SESSION["idProjet"]);
                // Article
                while($detail = $_projet->fetch())
                {
                    ?>
                        <p class="p-4 display-1 fw-bold"><?=  htmlspecialchars_decode($detail["name"]) ?></p>
                        <p class="p-1 lead "><?=  htmlspecialchars_decode($detail["description"]) ?></p>
                        <p class="p-1"><?= htmlspecialchars_decode($detail["content"]) ?></p>

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