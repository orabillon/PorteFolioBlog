<?php 
    $title = "Blog";
    $couleurEntete = "bg-third";
    $texteEntete = "Gestion blog";
    $couleurTexteEntete = "text-danger";

    // mise en cache du contenu de la page pour la creation de la variable du template
    ob_start();
?>

<script type="text/javascript">
function create_champ(i) {
var i2 = i + 1;
document.getElementById('leschamps_'+i).innerHTML = '<input type="file" name="image'+i+'"></span>';
/* on limite ici le nombre de champs à un maximum de 10 */
document.getElementById('leschamps_'+i).innerHTML += (i <= 10) ? '<br /><span id="leschamps_'+i2+'"><a href="javascript:create_champ('+i2+')">Ajouter un champs</a></span>' : '';
}
</script>

<section>
    <div class="p-3 bg-fourth">
        <div class="p-6 bg-light rounded-5">
            <form class="p-3" method="post" action="./createArticle" enctype="multipart/form-data">
                <p>
                    <label for="title" class="form-label">Titre</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </p>
                <p>
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="4" required></textarea>
                </p>
                <p>
                    <label for="content" class="form-label">Contenu</label>
                    <textarea class="form-control" name="content" id="content" rows="10" required></textarea>
                </p>
                <p>
                    <label for="category" class="form-label">Catégorie</label>
                    <select class="form-select" name="category" id="category" >

                    <?php
                        require_once("./model/CategorieManager.php");

                        // recuperation de toute les categorie 

                        $_categorieManager = new CategorieManager();
                        $liste = $_categorieManager -> getListeCategorie();

                        while($_cate = $liste->fetch())
                        {
                            ?>
                                <option value="<?= $_cate["id"]  ?>"><?= $_cate["categorie"]?></option>
                            <?php
                        }

                    ?>
                    </select>
                </p>
                <p>
                    <span id="leschamps_2"><a href="javascript:create_champ(2)">Ajouter une image</a></span>
                </p>
                <p class="form-check form-switch">
                    <label for="publish" class="form-check-label">Rendre accessible</label>
                    <input type="checkbox" name="publish" class="form-check-input" id="publish">     
                </p>
                <p>
                    <button type="submit" class="btn btn-secondary my-3">Créer</button>
                </p>
            </form>
        </div>
    </div>
</section>

<?php 
    $content = ob_get_clean();

    require("template.php");
?>