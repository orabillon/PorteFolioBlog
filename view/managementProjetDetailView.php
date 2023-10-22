<?php 
    $title = "Projet";
    $couleurEntete = "bg-primary";
    $texteEntete = "Mes Projets";
    $couleurTexteEntete = "text-white";


    $_Name          = "";
    $_Description   = "";
    $_Content       = "";
    $_Visible      = "Off";
    $_Update        = 0;

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

<?php

    if(isset($_SESSION["idEditProjet"]))
    {
       
        $_idProjet = htmlspecialchars($_SESSION["idEditProjet"]);
        $_Update = 1;
       
        require_once("./model/ProjetManager.php");
        $_projetManager = new ProjetManager();
        $_projet = $_projetManager->getProjet($_idProjet);

        while($res = $_projet->fetch())
        {
            $_Name          = $res["name"];
            $_Description   = $res["description"];
            $_Content       = $res["content"];

            if ($res["display"] == 1){
                $_Visible = "On";
            }
        }
    } 

?>

<section>
    <div class="p-3 bg-sixth">
        <div class="p-6 bg-light rounded-5">

            <?php 
                if(isset($_SESSION["idEditProjet"])){
                    $_idProjet = htmlspecialchars($_SESSION["idEditProjet"]);
                    ?>
                        <form class="p-3" method="post" action="./updateProjet" enctype="multipart/form-data"> 
                            <input type="hidden" id="idEditProjet" name="idEditProjet" value="<?= $_idProjet ?>" />
                    <?php
                }
                else
                {
                    ?>
                        <form class="p-3" method="post" action="./createProjet" enctype="multipart/form-data">
                    <?php
                }
            ?>
            
                <p>
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= $_Name ?>" required>
                </p>
                <p>
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="4" required><?= $_Description?></textarea>
                </p>
                <p>
                    <label for="content" class="form-label">Contenu</label>
                    <textarea class="form-control" name="content" id="content" rows="10" required><?= $_Content ?></textarea>
                </p>
                <p>
                    <span id="leschamps_2"><a href="javascript:create_champ(2)">Ajouter une image</a></span>
                </p>
                <p class="form-check form-switch">
                    <label for="display" class="form-check-label">Rendre accessible</label>

                    <?php 
                        if($_Visible == "On")
                        {
                            ?>
                                <input type="checkbox" name="display" class="form-check-input" id="display" checked>
                            <?php
                        }
                        else
                        {
                            ?>
                                <input type="checkbox" name="display" class="form-check-input" id="display">
                            <?php
                        }
                    ?>
                         
                </p>
                <p>
                    <?php
                        if($_Update == 1)
                        {
                            ?>
                                <button type="submit" class="btn btn-secondary my-3">Modifier</button>
                            <?php

                        }
                        else
                        {

                            ?>
                                <button type="submit" class="btn btn-secondary my-3">Créer</button>
                            <?php
                        }
                    ?>
                    
                </p>
            </form>
        </div>
    </div>
</section>



<?php 
    $content = ob_get_clean();

    require("template.php");
?>