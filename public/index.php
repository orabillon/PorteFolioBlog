<?php

require('../controller/controller.php');
require('../Utility/utility.php');

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
        $PageEnCours = getUri($_SERVER['REQUEST_URI']);
        if($PageEnCours != ""){
            if ($PageEnCours == "home" || $PageEnCours == "accueil" ) {
                home();
            }
            {
                throw new Exception("Cette page n'existe pas ou a été supprimée.");
            }
        }
        else{
            home();
        }

    }
}
catch(Exception $e) {
    $error = $e->getMessage();
    require('../view/errorView.php');
}