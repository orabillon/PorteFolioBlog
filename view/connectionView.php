<?php 

    $title = "Connexion";
    $couleurEntete = "bg-secondary";
    $texteEntete = "Connexion";
    $couleurTexteEntete = "text-danger";

    // mise en cache du contenu de la page pour la creation de la variable du template
    ob_start();
?>

<section class="container bg-fifth">
    <div class="p-6">
        <div class="p-7 bg-white rounded-5">
        <?php
        if(isset($_SESSION["connect"])){
            
            if(isset($_SESSION["idArticle"])){
            
                header("location:article");
                exit();
            }
            else
            {
                header("location:moi");
                exit();
            }
            
        }
        else
        {
            // message erreur de connection
            if(isset($_SESSION["userKo"]) && $_SESSION["userKo"] == true)
            {
                if(isset($_SESSION["userBlocked"]) && $_SESSION["userBlocked"] == true)
                {
                    ?>
                        <div class="alert alert-warning">
                            Votre compte est bloquer. 
                        </div>

                    <?php
                }
                else
                {
                    ?>
                        <div class="alert alert-danger">
                            Impossible de vous identifier correctement. 
                        </div>

                    <?php
                }
            }

            ?>
                <form class="p-3" method="post" action="./connection">
                <p>
                    <label for="email" class="form-label">Adresse email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </p>
                <p>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </p>
                <p class="form-check form-switch">
                    <label for="souvenir" class="form-check-label"> Se souvenir de moi</label>
                    <input type="checkbox" name="souvenir" class="form-check-input" id="souvenir">     
                </p>
                <p>
                    <button type="submit" class="btn btn-secondary my-3">Se connecter</button>
                    <a href="inscription" class="btn btn-outline-secondary m-3">S'inscrire</a>
                </p>
            </form>

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