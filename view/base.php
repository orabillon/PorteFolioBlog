<?php
    require_once('../model/CategorieManager.php');
    $categorieManager = new CategorieManager();
    $requeteCategorie = $categorieManager->getCategories();
    ob_start();
    while($cate = $requeteCategorie->fetch()) {

        ?>
        <li><a class="dropdown-item" href="<?= $cate['url']?>"><?= $cate['theme']?></a></li>
        <?php
    }

    $listeCategories = ob_get_clean();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/styles/css/defaut.css" />
    <script src="https://kit.fontawesome.com/6d87207cfc.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;300;400;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/400zolj9w30s1n9784ub2mmanothoc1ppp4olruvuhsg1mg0/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body class="<?php if ($BlogActif){ echo 'bg-Bcorp';} else { echo 'bg-corp'; } ?>">
<nav class="navbar navbar-dark <?php if ($BlogActif){ echo 'bg-Bprimary';} else { echo 'bg-secondary'; } ?> navbar-expand-md">
    <div class="container">
        <div class="navbar-brand">
            JHON DOE
        </div>
        <!-- Le bouton s'affichera en petit écran -->
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MenuDeroulant">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse "  id="MenuDeroulant">
            <ul class="navbar-nav">

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle  <?php if ($BlogActif){ echo 'active';} ?> " data-bs-toggle="dropdown">Aventure de bébé</a>
                    <ul class="dropdown-menu">
                        <?= $listeCategories ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="test" class="nav-link <?php if ($PorteFolioActif){ echo 'active';} ?>">Mes créations</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?= $content ?>

</body>
</html>
