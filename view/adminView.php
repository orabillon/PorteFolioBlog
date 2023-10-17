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

    $_userManager = new UserManager();
    
    // mise en cache du contenu de la page pour la creation de la variable du template
    ob_start();
?>

<section>
    <div class="p-3 bg-eighth">
        <div class="p-6 bg-light rounded-5">
            <h2>Gestion utilisateurs</h2>

            <table class="p-2 table table-striped table-hover table-responsive">

                <thead>
                    <td>Id</td>
                    <td>Prénom</td>
                    <td>Nom</td>
                    <td>E-Mail</td>
                    <td>Blocqué</td>
                    <td>Administrateur</td>
                    <td></td>
                </thead>
                <tbody>
                    <?php
                        $_listeUsers = $_userManager->getUsers();

                        while($_user = $_listeUsers->fetch())
                        {
                            ?>
                            <tr>
                                <td><?= $_user["id"]?></td>
                                <td><?= $_user["first_name"]?></td>
                                <td><?= $_user["last_name"]?></td>
                                <td><?= $_user["email"]?></td>
                                <td><?php if ($_user["blocked"] == 1) { echo "Oui"; } else { echo "Non"; } ?></td>
                                <td><?php if ($_user["admin"] == 1) { echo "Oui"; } else { echo "Non"; }  ?></td>
                                <td></td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    

    
    
</section>

<?php 
    $content = ob_get_clean();

    require("template.php");
?>