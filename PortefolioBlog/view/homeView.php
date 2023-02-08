<?php
$title = "Accueil";

ob_start();
?>

<section class="container">

    <h1>Bienvenue sur mon site MVC</h1>

</section>

<?php
$content = ob_get_clean();

require('base.php');
?>
