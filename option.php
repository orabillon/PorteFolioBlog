<?php

require_once("./class/User.php");
require_once("./model/UserManager.php");

    if(isset($_COOKIE["Auth"]) && !isset($_SESSION["connect"])){
        
        $_secret = htmlspecialchars($_COOKIE["Auth"]);

        $_userManager = new UserManager();
        $_user = $_userManager->searchUserCookie($_secret);

        // test si un utilisateur a été trouvé
        if(is_object($_user))
        {
             $_user->createSessions();  
        }
    }