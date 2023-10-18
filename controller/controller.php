<?php
require_once("option.php");

       // ROUTEUR 
       function connection()
       {
              require_once("./class/User.php");
              require_once("./model/UserManager.php");

              if(!isset($_SESSION['connect'])){

                     if(!empty($_POST["email"]) && !empty($_POST["password"])){

                            $_mail = htmlspecialchars($_POST["email"]);
                            $_password = htmlspecialchars($_POST["password"]);

                            $user_manager = new UserManager();
                            $user = $user_manager->searchUser($_mail, $_password);

                            
                            // Connection par cookie
                            if(isset($_POST["souvenir"]) == "on")
                            {
                                   if(is_object($user))
                                   {
                                          setcookie("Auth", $user->getSecret(),time() + 365*24*3600, "/", null, false, true);
                                   }
                            }

                            if(is_object($user))
                            {
                                 if($user->getBlocked() == 0)
                                 {
                                   $user->createSessions();  
                                 }
                                 else
                                 {
                                   $_SESSION["userKo"] = true;
                                   $_SESSION["userBlocked"] = true;
                                 }
                                 
                                   
                            }
                            else
                            {
                                   $_SESSION["userKo"] = true;
                            }
                     }
              }

              require("view/connectionView.php");
       }

       function me()
       {
              try
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

                            if($_messageManager->SaveMessage($_firstName, $_lastName, $_mail, $_message))
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
              catch (Exception $ex)
              {
                     throw new Exception($ex->getMessage());
              }
       }

       