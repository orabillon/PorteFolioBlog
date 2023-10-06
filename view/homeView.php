<?php 

    $title = "Accueil";

    // mise en cache du contenu de la page pour la creation de la variable du template
    ob_start();
?>

<section class="container">
    <h1 class="text-warning">Accueil</h1>
    <?php
        if(isset($_SESSION['connect'])){
            echo "Vous êtes connecter";
        }
        else
        {
            ?>
                <form method="post" action="index.php">
                    <p>
                        <label for="email">Email : </label>
                        <input  type="text" name="email" id="email" placeholder="Email" required>
                    </p>
                    <p>
                        <label for="password">Password : </label>
                        <input  type="password" name="password" id="password" placeholder="Password" required>
                    </p>
                    <p>
                    <button type="submit">Se connecter</button>
                    </p>
                </form>

            <?php
        }
    ?>
</section>

<?php 
    $content = ob_get_clean();

    require("template.php");
?>