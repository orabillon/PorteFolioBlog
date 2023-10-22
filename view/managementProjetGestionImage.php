<?php 
    $title = "Projet";
    $couleurEntete = "bg-primary";
    $texteEntete = "Mes Projets";
    $couleurTexteEntete = "text-white";

    // mise en cache du contenu de la page pour la creation de la variable du template
    ob_start();
?>

<section>
    <div class="p-3 bg-sixth">
        <div class="p-6 bg-light rounded-5">
            <?php
                if(isset($_SESSION["idEditProjet"]))
                {
                    require_once("./model/ProjetManager.php");
                    $_idProjet          = htmlspecialchars($_SESSION["idEditProjet"]);
                    $_projetManagement  = new ProjetManager();
                    $_listeImage        = $_projetManagement->getListeImageProjet($_idProjet); 

                    ?>
                        
                        <div  class="table-responsive">
                            <table class="my-4 table table-striped table-hover">
                                <thead class="text-center fw-bold thead-dark">
                                    <tr>
                                        <th>Image</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while($result = $_listeImage->fetch())
                                        {
                                        
                                            ?>
                                                <tr>
                                                    <td><?= $result["BaseImageName"]?></td>
                                                    <td><button type="button" data-bs-toggle="modal" data-bs-target="#delete-<?= $result["id"] ?>"><i class="fa-regular fa-trash-can"></i></button></td>
                                                </tr>
                                                <div class="modal fade" id="delete-<?= $result["id"] ?>" data-bs-backdrop="static">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">

                                                            <!-- Header -->
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                                    <span>&times;</span>
                                                                </button>
                                                            </div>

                                                            <!-- Body -->
                                                            <div class="modal-body">
                                                                <p class="m-0">Supprimer l'image <?= $result["BaseImageName"]?></p>
                                                            </div>

                                                            <!-- Footer -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                                                                
                                                                <form method="post" action="./gestionImageProjetDelete">
                                                                    <input type="hidden" id="idProjet" name="idProjet" value="<?= $_idProjet ?>" />
                                                                    <input type="hidden" id="idDeleteImageProjet" name="idDeleteImageProjet" value="<?= $result["id"] ?>" />
                                                                    <input type="hidden" id="NameDeleteImageProjet" name="NameDeleteImageProjet" value="<?= $result["image"] ?>" />
                                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            <?php
                                        }
                                    ?>
                                </tbody> 
                            </table>
                        </div>
                        
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