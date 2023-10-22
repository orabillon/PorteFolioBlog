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
            <a href="./managementProjetDetailView"><i class="fa-solid fa-circle-plus fa-2xl"></i></a>
            <div  class="table-responsive">
                <table class="my-4 table table-striped table-hover">

                    <thead class="text-center fw-bold thead-dark">
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Date création</th>
                            <th>Date dernière modification</th>
                            <th>Publier</th>
                            <th colspan="3">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        require_once("./model/ProjetManager.php");
                        $_projetManager = new ProjetManager();

                        $_listeProjet = $_projetManager->getListeProjetManagement(); 

                        while($_projet = $_listeProjet->fetch())
                        {
                        
                        ?>
                            <tr>                               
                                <td><?= htmlspecialchars_decode($_projet["name"]) ?></td>
                                <td><?= htmlspecialchars_decode($_projet["description"]) ?></td>
                                <td class="text-center"><?= $_projet["date_creation"] ?></td>
                                <td class="text-center"><?= $_projet["date_update"] ?></td>
                                <td class="text-center"><?php if($_projet["display"] == 1){ echo "Oui";} else {echo "Non";}  ?></td>
                                <td><button type="button" data-bs-toggle="modal" data-bs-target="#edit-<?= $_projet["id"] ?>"><i class="fa-solid fa-pen-nib"></i></button></td>
                                <td><button type="button" data-bs-toggle="modal" data-bs-target="#gestionImg-<?= $_projet["id"] ?>"><i class="fa-regular fa-image"></i></button></td>
                                <td><button type="button" data-bs-toggle="modal" data-bs-target="#delete-<?= $_projet["id"] ?>"><i class="fa-regular fa-trash-can"></i></button></td>
                            </tr>
                            <!-- Modales -->
                            <div class="modal fade" id="delete-<?= $_projet["id"] ?>" data-bs-backdrop="static">
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
                                                <p class="m-0">Supprimer le projet - <?= htmlspecialchars_decode($_projet["name"]) ?></p>
                                            </div>

                                            <!-- Footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                                                
                                                <form method="post" action="./deleteProjet">
                                                    <input type="hidden" id="idDeleteProjet" name="idDeleteProjet" value="<?= $_projet["id"] ?>" />
                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="modal fade" id="edit-<?= $_projet["id"] ?>" data-bs-backdrop="static">
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
                                                <p class="m-0">Modifier le projet - <?= htmlspecialchars_decode($_projet["name"]) ?></p>
                                            </div>

                                            <!-- Footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                                                
                                                <form method="post" action="./editProjet">
                                                    <input type="hidden" id="idEditProjet" name="idEditProjet" value="<?= $_projet["id"] ?>" />
                                                    <button type="submit" class="btn btn-danger">Modifier</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div> 
                                <div class="modal fade" id="gestionImg-<?= $_projet["id"] ?>" data-bs-backdrop="static">
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
                                                <p class="m-0">Gérer les images du projet - <?= htmlspecialchars_decode($_projet["name"]) ?></p> 
                                            </div>

                                            <!-- Footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                                                
                                                <form method="post" action="./gestionImageProjet">
                                                    <input type="hidden" id="idEditProjet" name="idEditProjet" value="<?= $_projet["id"] ?>" />
                                                    <button type="submit" class="btn btn-danger">Gérer images</button>
                                                </form>
                                            </div>

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
        </div>
    </div>
</section>

<?php 
    $content = ob_get_clean();

    require("template.php");
?>