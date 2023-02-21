<?php

function home() {
    require('../model/UserManager.php');
    

    $userManager        = new UserManager();
    $requete            = $userManager->getUsers();

    require('../view/homeView.php');
}

function test(){
    require('../view/testView.php');
}

