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
              require_once("./model/MessageManager.php");

              $_SESSION["msgEnvoyer"] = 0;

              if(!empty($_POST["firstName"]) && !empty($_POST["lastName"]) && !empty($_POST["email"]) && !empty($_POST["message"]))
              {
                     // enregistrement message en base
                     $_messageManager = new MessageManager();

                     //Securisation variable
                     $_firstName   = htmlspecialchars($_POST["firstName"]);
                     $_lastName    = htmlspecialchars($_POST["lastName"]);
                     $_mail        = htmlspecialchars($_POST["email"]);
                     $_message     = htmlspecialchars($_POST["message"]);

                     if($_messageManager->EnregistrerMessage($_firstName, $_lastName, $_mail, $_message))
                     {
                            $_SESSION["msgEnvoyer"] = 1;
                     }
                     else
                     {
                            $_SESSION["msgEnvoyer"] = 2;
                     }
                     
                    
              }
              

              require("view/meView.php"); 
       }

       function article()
       {
              if(!empty($_POST["postId"]))
              {
                     $_SESSION["idArticle"] = $_POST["postId"];
              }
              

              require("view/ArticleView.php"); 
       }

       