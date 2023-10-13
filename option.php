<?php

require_once("./class/User.php");
require_once("./model/UserManager.php");

    if(isset($_COOKIE["Auth"]) && !isset($_SESSION["connect"])){
        
        $_secret = htmlspecialchars($_COOKIE["Auth"]);

        $_userManager = new UserManager();
        $_user = $_userManager->searchUserCookie($_secret);

        if(is_object($_user))
        {
             $_user->creerLesSessions();  
        }
    }