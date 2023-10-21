<?php 
    $title = "Liste projet";
    $couleurEntete = "bg-primary";
    $texteEntete = "Mes Projets";
    $couleurTexteEntete = "text-white";

    // mise en cache du contenu de la page pour la creation de la variable du template
    ob_start();
?>

<section class="bg-sixth">

    <div class="row">

        <?php
        require_once("./model/ProjetManager.php");
        
        $_projetManager = new ProjetManager();

        $_liste = $_projetManager->getListeProjet();

        while($_resultat = $_liste->fetch())
        {
            // création des cartes
            ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card m-3"> 
                        <?php
                            // recuperation image
                            $resultat = $_projetManager->getImageCardProjet($_resultat["id"]);
                            if( $resultat != null){
                                echo '<img src="./public/Assets/'.$resultat.'" alt="image" class="card-img-top" />';
                            }
                        ?>
                        <div class="card-body" style="min-height: 110px">
                            <h5><?= htmlspecialchars_decode($_resultat["description"]) ?></h5>
                        </div>
                        <div class="card-footer">
                            <form method="post" action="projet">
                                <input type="hidden" id="projetId" name="projetId" value="<?= $_resultat["id"] ?>" />
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