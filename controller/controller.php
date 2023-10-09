<?php
session_start();

       // ROUTEUR 
       function home()
       {
              require_once("./class/User.php");
              require_once("./model/UserManager.php");

              if(!isset($_SESSION['connect'])){
                     
                     if(!empty($_POST["email"]) && !empty($_POST["password"])){
                            $_mail = htmlspecialchars($_POST["email"]);
                            $_password = htmlspecialchars($_POST["password"]);

                            $user_manager = new UserManager();
                            $user = $user_manager->searchUser($_mail, $_password);

                            if(is_object($user))
                            {
                                 $user->creerLesSessions();  
                            }
                     }
              }

              require("view/homeView.php");
       }

       function blog()
       {
              require("view/blogView.php");
       }

       function me()
       {
              require("view/meView.php"); 
       }

       