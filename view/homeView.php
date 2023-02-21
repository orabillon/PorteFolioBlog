<?php
$title = "Accueil";
$BlogActif = true;

ob_start();
?>

<section class="container">

    <h1>Bienvenue sur mon site MVC</h1>
    <i class="fa-solid fa-user"></i>

</section>


<?php
$content = ob_get_clean();

require('base.php');
?>
