<?php 

    $title = "Inscription";
    $couleurEntete = "bg-secondary";
    $texteEntete = "Inscription";
    $couleurTexteEntete = "text-danger";

    // mise en cache du contenu de la page pour la creation de la variable du template
    ob_start();
?>

<section class="container bg-fifth">
    <div class="p-6">
        <div class="p-7 bg-white rounded-5">
        <?php
            if(isset($_SESSION["connect"]))
            {
                header("location:moi");
                exit();  
            }

            // Recuperation ancienne valeur saisie
            $_errInscriptionFirstName = "";
            $_errInscriptionLastName = "";
            $_errInscriptionMail = "";
            
            // Affichage notification d'erreur
            if(isset($_SESSION["errInscription"]))
            {
                if($_SESSION["errInscription"] == 1)
                {
                    ?>
                        <div class="alert alert-danger">
                            il existe déjà un compte avec cet email. 
                        </div>

                    <?php
                }
                else if ($_SESSION["errInscription"] == 2)
                {
                    ?>
                        <div class="alert alert-danger">
                            Votre adresse email est invalide.
                        </div>

                    <?php
                }
                else if ($_SESSION["errInscription"] == 3)
                {
                    ?>
                        <div class="alert alert-danger">
                             Les mot de passe ne correspondent pas.
                        </div>

                    <?php
                }
                else if ($_SESSION["errInscription"] == 4)
                {
                    ?>
                        <div class="alert alert-success">
                            Vous êtes maintenant inscrit. Vous pouvez vous <a href="connection">connecté</a>.
                        </div>

                    <?php
                }
                else if ($_SESSION["errInscription"] == 5)
                {
                    ?>
                        <div class="alert alert-danger">
                            Erreur lors de l'enregistrement en base.
                        </div>

                    <?php
                }

                $_errInscriptionFirstName = $_SESSION["errInscriptionFirstName"];
                $_errInscriptionLastName  = $_SESSION["errInscriptionLastName"];
                $_errInscriptionMail      = $_SESSION["errInscriptionMail"];
            }
        ?>
            <form class="p-3" method="post" action="./inscription">
            <p>
                <label for="firstName" class="form-label">Prénom</label>
                <input type="text" name="firstName" id="firstName" class="form-control" value="<?= $_errInscriptionFirstName ?>" required>
            </p>
            <p>
                <label for="lastName" class="form-label">Nom</label>
                <input type="text" name="lastName" id="lastName" class="form-control" value="<?= $_errInscriptionLastName ?>" required>
            </p>
            <p>
                <label for="email" class="form-label">Adresse email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= $_errInscriptionMail ?>" required>
            </p>
            <p>
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </p>
            <p>
                <label for="password2" class="form-label">Confirmation mot de passe</label>
                <input type="password" name="password2" id="password2" class="form-control" required>
            </p>
            <p>
                <button type="submit" class="btn btn-secondary my-3">S'inscrire</button>
            </p>
        </form>

        </div>
    </div>
</section>

<?php 
    $content = ob_get_clean();

    require("template.php");
?>