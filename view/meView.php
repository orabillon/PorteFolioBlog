<?php 
    $title = "Qui suis-je ?";
    $couleurEntete = "bg-primary";
    $texteEntete = "A Propos De Moi";
    $couleurTexteEntete = "text-white";

    // mise en cache du contenu de la page pour la creation de la variable du template
    ob_start();
?>

<section>
    <!-- Presentation -->
    <div class="p-3 bg-third">
        <div class="p-6 bg-fourth rounded-5">
            <div class="row">
                <div class="col">
                    <img class="rounded-circle" style="width:300px" src="./public/Assets/Portrait.jpg" alt="Mon portrait">
                </div>
                <div class="col g-5">
                    <p>
                    <span class="align-middle">Bienvenue sur mon portfolio. <br><br> Je suis un développeur web passionné. Mon expertise réside dans la création de sites web interactifs et esthétiques. Ma passion pour la technologie se traduit par des projets web exceptionnels. Découvrez mon travail et contactez-moi pour des collaborations inspirantes.</span>
                    </p>
                </div>
            </div>
        </div>
    </div>  
</section>
<section>
    <!-- Competence -->
    <div class="p-3 bg-third">
        <div class="p-6 bg-fourth rounded-5">
            <p class="h1">Mes compétences</p> 
            <div class="row">
                <div class="col-1">
                <i class="fa-brands fa-html5 fa-xl"></i>
                </div>
                <div class="col-11 g-2">
                    <div class="progress mt-1">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark w-100"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                <i class="fa-brands fa-css3-alt fa-xl"></i>
                </div>
                <div class="col-11 g-2">
                    <div class="progress mt-1">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark w-100"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                <i class="fa-brands fa-bootstrap fa-xl"></i>
                </div>
                <div class="col-11 g-2">
                    <div class="progress mt-1">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark w-75"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                <i class="fa-brands fa-sass fa-xl"></i>
                </div>
                <div class="col-11 g-2">
                    <div class="progress mt-1">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark w-50"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                <i class="fa-brands fa-php fa-xl"></i>
                </div>
                <div class="col-11 g-2">
                    <div class="progress mt-1">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark w-75"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                <i class="bi bi-filetype-sql"></i>
                </div>
                <div class="col-11 g-2">
                    <div class="progress mt-1">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark w-75"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <!-- Contact -->
    <div class="p-3 bg-third">
        <div class="p-6 bg-fourth rounded-5">
            <p class="h1">Me contacter</p>
            <?php
                // Affichage notification de reussite enregistrement du message de l'utilisateur
                if(isset($_SESSION["msgEnvoyer"]))
                {
                    if($_SESSION["msgEnvoyer"] == 1)
                    {
                        ?>
                            <div class="alert alert-info">
                                Message enregistré.
                            </div>

                        <?php
                    }
                    else if ($_SESSION["msgEnvoyer"] == 2)
                    {
                        ?>
                            <div class="alert alert-danger">
                                Erreur lors de l'enregistrement du message.
                            </div>

                        <?php
                    }
                }
            ?>
            <form class="p-3" method="post" action="./moi">
                <p>
                    <label for="firstName" class="form-label">Prénom</label>
                    <input type="text" name="firstName" id="firstName" class="form-control" required>
                </p>
                <p>
                    <label for="lastName" class="form-label">Nom</label>
                    <input type="text" name="lastName" id="lastName" class="form-control" required>
                </p>
                <p>
                    <label for="email" class="form-label">Adresse email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </p>
                <p>
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" name="message" id="message" rows="8" required></textarea>
                </p>
                <p>
                    <button type="submit" class="btn btn-secondary mb-3">Enregistrer</button>
                </p>
            </form>
        </div>
    </div>  
</section>

<?php 
    $content = ob_get_clean();

    require("template.php");
?>