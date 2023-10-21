<?php 
    $title = "Blog";
    $couleurEntete = "bg-third";
    $texteEntete = "Gestion blog";
    $couleurTexteEntete = "text-danger";

    // mise en cache du contenu de la page pour la creation de la variable du template
    ob_start();
?>

<section>
    <div class="p-3 bg-fourth">
        <div class="p-6 bg-light rounded-5">
            <a href="./managementArticleView"><i class="fa-solid fa-circle-plus fa-2xl"></i></a>
            <div  class="table-responsive">
                <table class="my-4 table table-striped table-hover">

                    <thead class="text-center fw-bold thead-dark">
                        <tr>
                            <th>Titre</th>
                            <th>Catégorie</th>
                            <th>Description</th>
                            <th>Date création</th>
                            <th>Date dernière modification</th>
                            <th>Publier</th>
                            <th colspan="3">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        require_once("./model/ArticleManager.php");
                        $_articleManager = new ArticleManager();

                        $_listeArticle = $_articleManager->getListeArticleManagement();

                        while($_article = $_listeArticle->fetch())
                        {
                        
                        ?>
                            <tr>                               
                                <td><?= htmlspecialchars_decode($_article["title"]) ?></td>
                                <td><?= htmlspecialchars_decode($_article["categorie"]) ?></td>
                                <td><?= htmlspecialchars_decode($_article["description"]) ?></td>
                                <td class="text-center"><?= $_article["date_creation"] ?></td>
                                <td class="text-center"><?= $_article["date_update"] ?></td>
                                <td class="text-center"><?php if($_article["published"] == 1){ echo "Oui";} else {echo "Non";}  ?></td>
                                <td><button type="button" data-bs-toggle="modal" data-bs-target="#edit-<?= $_article["id"] ?>"><i class="fa-solid fa-pen-nib"></i></button></td>
                                <td><button type="button" data-bs-toggle="modal" data-bs-target="#gestionImg-<?= $_article["id"] ?>"><i class="fa-regular fa-image"></i></button></td>
                                <td><button type="button" data-bs-toggle="modal" data-bs-target="#delete-<?= $_article["id"] ?>"><i class="fa-regular fa-trash-can"></i></button></td>
                            </tr>
                            <!-- Modales -->
                            <div class="modal fade" id="delete-<?= $_article["id"] ?>" data-bs-backdrop="static">
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
                                                <p class="m-0">Supprimer l'article</p>
                                            </div>

                                            <!-- Footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                                                
                                                <form method="post" action="./deleteArticle">
                                                    <input type="hidden" id="idDeleteArticle" name="idDeleteArticle" value="<?= $_article["id"] ?>" />
                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="edit-<?= $_article["id"] ?>" data-bs-backdrop="static">
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
                                                <p class="m-0">Modifier l'article</p>
                                            </div>

                                            <!-- Footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                                                
                                                <form method="post" action="./editArticle">
                                                    <input type="hidden" id="idEditArticle" name="idEditArticle" value="<?= $_article["id"] ?>" />
                                                    <button type="submit" class="btn btn-danger">Modifier</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="gestionImg-<?= $_article["id"] ?>" data-bs-backdrop="static">
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
                                                <p class="m-0">Gérer les images de l'article</p>
                                            </div>

                                            <!-- Footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                                                
                                                <form method="post" action="./gestionImageArticle">
                                                    <input type="hidden" id="idEditArticle" name="idEditArticle" value="<?= $_article["id"] ?>" />
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