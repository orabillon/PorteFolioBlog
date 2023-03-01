<?php

function home() {
    require('../model/UserManager.php');

    $userManager        = new UserManager();
    $requeteUser        = $userManager->getUsers();

    require('../view/homeView.php');
}

function test(){

    require('../view/testView.php');
}

