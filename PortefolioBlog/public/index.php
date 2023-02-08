<?php

// OK
$uri = (mb_split("&", $_SERVER['REQUEST_URI']));
$page = mb_split("/", $uri[0]);
$fin = end($page); // on a $fin = 'toto?id=1'

// ne retourne plus rien
$p = mb_split("\?", $fin); // KO
//$p = mb_split('?', $fin); // KO
//$p = mb_split('?', $fin[0]); // KO

echo $p[0];





require('../controller/controller.php');

try {
    if(isset($_GET['page'])) {

        if($_GET['page'] == 'accueil') {
            home();
        }
        else {
            throw new Exception("Cette page n'existe pas ou a été supprimée.");
        }

    }
    else {
        home();
    }
}
catch(Exception $e) {
    $error = $e->getMessage();
    require('../view/errorView.php');
}