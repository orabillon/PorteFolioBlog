<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="public/design/defaut.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/6d87207cfc.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
    <div class="container">
     
    <!-- Entete de page -->
    <header>
        <p class="p-3 mb-0 h1 <?= $couleurTexteEntete ?> text-center <?= $couleurEntete?>" ><?= $texteEntete ?></p>
    </header>

    <!-- Barre de navigation -->
    <nav class="navbar navbar-dark bg-dark navbar-expand-md mt-0">
    
        <div class="navbar-brand">
            OLIVIER RABILLON
        </div>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#Menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="Menu">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?php 
                        // recherche de la page active pour mettre le lien en actif dans navigation bootstrap
                        if (isset($_REQUEST["page"]) && ($_REQUEST["page"] == "blog" || $_REQUEST["page"] == "article"))
                        {
                    ?>
                        <a href="blog" class="nav-link active">Mon blog</a>
                    <?php 
                        }
                        else
                        { 
                    ?>
                        <a href="blog" class="nav-link">Mon blog</a>
                    <?php 
                        }
                    ?>
                </li>
                <li class="nav-item">
                <?php 
                    if (isset($_REQUEST["page"]) && $_REQUEST["page"] == "projet")
                    {
                ?>
                    <a href="projet" class="nav-link active">Mes projets</a>
                <?php 
                    }
                    else
                    {
                ?>
                    <a href="projet" class="nav-link">Mes projets</a>
                <?php 
                    }
                ?>  
                </li>
                <li class="nav-item">
                <?php 
                    if ((isset($_REQUEST["page"]) && $_REQUEST["page"] == "moi") || !isset($_REQUEST["page"]))
                    {
                ?>
                    <a href="moi" class="nav-link active">Qui suis-je ?</a>
                <?php 
                    }
                    else
                    {
                ?>
                    <a href="moi" class="nav-link">Qui suis-je ?</a>
                <?php 
                    }
                ?>
                    
                </li>
                <?php 
                    if (isset($_SESSION["connect"]))
                    {
                ?>
                    <li class="nav-item">
                    <?php 
                        if ( isset($_SESSION["connect"]) && (isset($_REQUEST["page"]) && $_REQUEST["page"] == "compte"))
                        {
                            // supprimer les message quand on clique dans la barre de navigation
                            $_SESSION["cptModif"] = 0;
                            $_SESSION["pwdModif"] = 0;
                    ?>
                        <a href="compte" class="nav-link active">Mon compte</a>
                    <?php 
                        }
                        else
                        {
                            $_SESSION["cptModif"] = 0;
                            $_SESSION["pwdModif"] = 0;
                    ?>
                        <a href="compte" class="nav-link">Mon compte</a>
                    <?php 
                        }
                       
                    }
                    else
                    {
                    ?>
                        <li class="nav-item">
                    <?php 
                        if (isset($_REQUEST["page"]) && $_REQUEST["page"] == "connection")
                        {
                            // Supprime message d'erreur en cas de clique sur le lien
                            $_SESSION["userKo"] = false;
                    ?>
                        <a href="connection" class="nav-link active">Se connecter</a>
                    <?php 
                        }
                        else
                        {
                            $_SESSION["userKo"] = false;
                    ?>
                        <a href="connection" class="nav-link">Se connecter</a>
                    <?php 
                        }
                       
                    }
                    
                    ?>
                    
                    </li>
                </li>
                <?php 
                    if (isset($_SESSION["connect"]))
                    {
                ?>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">Se déconnecter</a>
                </li>
                <?php 
                    }
                    ?>
             </ul>
        </div>
    
    </nav>

    <?= $content?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>