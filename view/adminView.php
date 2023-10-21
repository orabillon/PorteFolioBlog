<?php 
    $title = "Administration";
    $couleurEntete = "bg-seventh";
    $texteEntete = "Administration";
    $couleurTexteEntete = "text-white";

    if($_SESSION["admin"] == 0)
    {
            header("location:blog");
            exit();
    }

    require_once("./model/UserManager.php");
    require_once("./model/MessageManager.php");

    $_userManager = new UserManager();
    $_messageManager = new MessageManager();
    
    // mise en cache du contenu de la page pour la creation de la variable du template
    ob_start();
?>

<section>
    <div class="p-3 bg-eighth">
        <div class="p-6 bg-light rounded-5">
            <h2>Gestion utilisateurs</h2>
            <div  class="table-responsive">
                <table class="my-4 table table-striped table-hover">

                    <thead class="text-center fw-bold">
                        <tr>
                            <th>Id</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>E-Mail</th>
                            <th>Bloqué</th>
                            <th>Administrateur</th>
                            <th colspan="5">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $_listeUsers = $_userManager->getUsers();

                            while($_user = $_listeUsers->fetch())
                            {
                                ?>
                                <tr>
                                    <td class="text-center"><?= $_user["id"]?></td>
                                    <td><?= $_user["first_name"]?></td>
                                    <td><?= $_user["last_name"]?></td>
                                    <td><?= $_user["email"]?></td>
                                    <td class="text-center"><?php if ($_user["blocked"] == 1) { echo "Oui"; } else { echo "Non"; } ?></td>
                                    <td class="text-center"><?php if ($_user["admin"] == 1) { echo "Oui"; } else { echo "Non"; }  ?></td>
                                    <td><button type="button" data-bs-toggle="modal" data-bs-target="#delete-<?= $_user["id"] ?>"><i class="fa-regular fa-trash-can"></i></button></td>
                                    <td><button type="button" data-bs-toggle="modal" data-bs-target="#lock-<?= $_user["id"] ?>"><i class="fa-solid fa-lock"></i></button></td>
                                    <td><button type="button" data-bs-toggle="modal" data-bs-target="#unLock-<?= $_user["id"] ?>"><i class="fa-solid fa-lock-open"></i></button></td>
                                    <td><button type="button" data-bs-toggle="modal" data-bs-target="#addAdmin-<?= $_user["id"] ?>"><i class="fa-solid fa-user-plus"></i></button></td>
                                    <td><button type="button" data-bs-toggle="modal" data-bs-target="#delAdmin-<?= $_user["id"] ?>"><i class="fa-solid fa-user-minus"></i></button></td>
                                </tr>
                                
                                <!-- Modales -->
                                <div class="modal fade" id="delete-<?= $_user["id"] ?>" data-bs-backdrop="static">
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
                                                <p class="m-0">Supprimer l'utilisateur <?= $_user["first_name"]?> - <?= $_user["last_name"]?></p>
                                            </div>

                                            <!-- Footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                                                
                                                <form method="post" action="./deleteUserAdmin">
                                                    <input type="hidden" id="idDeleteUser" name="idDeleteUser" value="<?= $_user["id"] ?>" />
                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="lock-<?= $_user["id"] ?>" data-bs-backdrop="static">
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
                                                <p class="m-0">Bloquer l'utilisateur <?= $_user["first_name"]?> - <?= $_user["last_name"]?></p>
                                            </div>

                                            <!-- Footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                                                
                                                <form method="post" action="./lockUserAdmin">
                                                    <input type="hidden" id="idLockUser" name="idLockUser" value="<?= $_user["id"] ?>" />
                                                    <button type="submit" class="btn btn-danger">Bloquer</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="unLock-<?= $_user["id"] ?>" data-bs-backdrop="static">
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
                                                <p class="m-0">Débloquer l'utilisateur <?= $_user["first_name"]?> - <?= $_user["last_name"]?></p>
                                            </div>

                                            <!-- Footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                                                
                                                <form method="post" action="./unLockUserAdmin">
                                                    <input type="hidden" id="idUnLockUser" name="idUnLockUser" value="<?= $_user["id"] ?>" />
                                                    <button type="submit" class="btn btn-danger">Débloquer</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="addAdmin-<?= $_user["id"] ?>" data-bs-backdrop="static">
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
                                                <p class="m-0">Rendre l'utilisateur <?= $_user["first_name"]?> - <?= $_user["last_name"]?> administrateur ?</p>
                                            </div>

                                            <!-- Footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                                                
                                                <form method="post" action="./addUserAdmin">
                                                    <input type="hidden" id="idModifAdminUser" name="idModifAdminUser" value="<?= $_user["id"] ?>" />
                                                    <button type="submit" class="btn btn-danger">Donner les droits</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="delAdmin-<?= $_user["id"] ?>" data-bs-backdrop="static">
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
                                                <p class="m-0">Enlever les droits d'administrateur à l'utilisateur <?= $_user["first_name"]?> - <?= $_user["last_name"]?></p>
                                            </div>

                                            <!-- Footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                                                
                                                <form method="post" action="./delUserAdmin">
                                                    <input type="hidden" id="idModifAdminUser" name="idModifAdminUser" value="<?= $_user["id"] ?>" />
                                                    <button type="submit" class="btn btn-danger">Supprimer les droits</button>
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
        </div>
    </div>

</section>
<section>
    <div class="p-3 bg-eighth">
        <div class="p-6 bg-light rounded-5">
            <h2>Gestion Message</h2>
            <div  class="table-responsive">
                <table class="my-4 table table-striped table-hover">

                    <thead class="text-center fw-bold thead-dark">
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>E-Mail</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th colspan="2">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                            $_listeMessaage = $_messageManager->getListMessage();

                            while($_message = $_listeMessaage->fetch())
                            {
                            
                            ?>
                                <tr>                               
                                    <td><?= $_message["first_name"]?></td>
                                    <td><?= $_message["last_name"]?></td>
                                    <td><?= $_message["email"]?></td>
                                    <td class="text-break"><?= $_message["content"]?></td>
                                    <td><?= $_message["status"]?></td>
                                    <td><button type="button" data-bs-toggle="modal" data-bs-target="#deleteMessage-<?= $_message["messID"] ?>"><i class="fa-regular fa-trash-can"></i></button></td>
                                    <td><button type="button" data-bs-toggle="modal" data-bs-target="#updateMessage-<?= $_message["messID"] ?>"><i class="fa-solid fa-book"></i></button></td>
                                </tr>
                                <!-- Modales -->
                                <div class="modal fade" id="deleteMessage-<?= $_message["messID"] ?>" data-bs-backdrop="static">
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
                                                <p class="m-0">Supprimer le message</p>
                                            </div>

                                            <!-- Footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                                                
                                                <form method="post" action="./deleteMessage">
                                                    <input type="hidden" id="idDeleteMessage" name="idDeleteMessage" value="<?= $_message["messID"] ?>" />
                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="updateMessage-<?= $_message["messID"] ?>" data-bs-backdrop="static">
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
                                                <p class="m-0">Marquer le message comme Lu ?</p>
                                            </div>

                                            <!-- Footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                                                
                                                <form method="post" action="./updateMessage">
                                                    <input type="hidden" id="idUpdateMessage" name="idUpdateMessage" value="<?= $_message["messID"] ?>" />
                                                    <button type="submit" class="btn btn-danger">Lu</button>
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
        </div>
    </div>
</section>

<?php 
    $content = ob_get_clean();

    require("template.php");
?>