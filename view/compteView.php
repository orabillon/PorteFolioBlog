<?php 

    $title = "Mon compte";
    $couleurEntete = "bg-secondary";
    $texteEntete = "Compte";
    $couleurTexteEntete = "text-danger";

    // mise en cache du contenu de la page pour la creation de la variable du template
    ob_start();

    require_once("./class/User.php");
    require_once("./class/Security.php");
    require_once("./model/UserManager.php");

    $_userManager = new UserManager();
    $user = $_userManager->getUser($_SESSION["idUser"]);
?>

<section class="container bg-fifth">
    <div class="p-3">
        <div class="bg-white p-5 bg-white rounded-5">

        <?php
            // Affichage notification de reussite enregistrement du message de l'utilisateur
            if(isset($_SESSION["cptModif"]))
            {
                if($_SESSION["cptModif"] == 1)
                    { 
                ?>
                    <div class="alert alert-success">
                        Compte modifier.
                    </div>

                <?php
                    }
                    else if($_SESSION["cptModif"] == 2)
                    { 
                ?>
                    <div class="alert alert-danger">
                        il existe déjà un compte avec cet email.
                    </div>

                <?php
                    } else if($_SESSION["cptModif"] == 3)
                    { 
                ?>
                    <div class="alert alert-danger">
                        Votre adresse email est invalide.
                    </div>

                <?php
                    } else if($_SESSION["cptModif"] == 4)
                    { 
                ?>
                    <div class="alert alert-danger">
                        Une erreur c'est produite lors de la modification.
                    </div>

                <?php
                    }
            }
        ?>
            <form class="p-3" method="post" action="./updateCompte">
                <p>
                    <label for="firstName" class="form-label">Prénom</label>
                    <input type="text" name="firstName" id="firstName" class="form-control" value="<?= $user->getFirstName()  ?>" required>
                </p>
                <p>
                    <label for="lastName" class="form-label">Nom</label>
                    <input type="text" name="lastName" id="lastName" class="form-control" value="<?= $user->getLastName() ?>" required>
                </p>
                <p>
                    <label for="email" class="form-label">Adresse email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= $user->getMail() ?>" required>
                </p>
                <p>
                    <button type="submit" class="btn btn-secondary my-3">Modifier</button>
                </p>
            </form>
        </div>
    </div>
</section>

<section class="container bg-fifth">
    <div class="p-3">
        <div class="bg-white p-5 bg-white rounded-5">
            <?php
                // Affichage notification de reussite enregistrement du message de l'utilisateur
                if(isset($_SESSION["pwdModif"]))
                {
                    if($_SESSION["pwdModif"] == 1)
                    {    
                    ?>
                        <div class="alert alert-success">
                            Mot de passe modifier.
                        </div>

                    <?php
                    }
                    else if($_SESSION["pwdModif"] == 2)
                    {    
                    ?>
                        <div class="alert alert-danger">
                            Les mot de passe ne correspondent pas.
                        </div>

                    <?php
                    }
                    else if($_SESSION["pwdModif"] == 3)
                    {
                        ?>
                        <div class="alert alert-danger">
                            Erreur lors de la tentative de modification.
                        </div>

                        <?php 
                    }
                }
            ?>
            <form class="p-3" method="post" action="./updateComptePassword">
                <p>
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </p>
                <p>
                    <label for="password2" class="form-label">Confirmation mot de passe</label>
                    <input type="password" name="password2" id="password2" class="form-control" required>
                </p>
                <p>
                    <button type="submit" class="btn btn-secondary my-3">Modifier</button>
                </p>
            </form>
        </div>
    </div>
</section>

<?php 
    $content = ob_get_clean();

    require("template.php");
?>