<?php

function home() {
    require('../model/UserManager.php');
    

    $userManager        = new UserManager();
    $requete            = $userManager->getUsers();

    require('../view/usersView.php');
}

