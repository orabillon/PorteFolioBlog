<?php
session_start();

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
                                 $user->creerLesSessions();  
                            }
                            else
                            {
                                   $_SESSION["userKo"] = true;
                            }
                     }
              }

              require("view/connectionView.php");
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
              

              require("view/articleView.php"); 
       }

       function projet()
       {
              require("view/listeProjetView.php");
       }

       function compte()
       {
              require("view/compteView.php");  
       }

       function inscription()
       {
              if(!empty($_POST["firstName"]) && !empty($_POST["lastName"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["password2"]))
              {
                     
                     require_once("./model/UserManager.php");
                     
                     $_userManager = new UserManager();

                     //Securisation variable
                     $_firstName       = htmlspecialchars($_POST["firstName"]);
                     $_lastName        = htmlspecialchars($_POST["lastName"]);
                     $_mail            = htmlspecialchars($_POST["email"]);
                     $_password        = htmlspecialchars($_POST["password"]);
                     $_verifPassword   = htmlspecialchars($_POST["password2"]);

                     $_SESSION["errInscriptionFirstName"]   = $_firstName;
                     $_SESSION["errInscriptionLastName"]    = $_lastName;
                     $_SESSION["errInscriptionMail"]        = $_mail;

                     // test mail
                     if (!filter_var($_mail, FILTER_VALIDATE_EMAIL)) {
                            $_SESSION["errInscription"]            = 2;
                            header('location: inscription');
                            exit();
                     }
       
                     // test mot de passe
                     if ($_password != $_verifPassword) {
                            $_SESSION["errInscription"]            = 3;
                            header('location: inscription');
                            exit();
                     }

                     require_once("./class/User.php");
                     require_once("./class/Security.php");

                     $_password = Security::chiffer($_password);

                     $_userManager = new UserManager();
                     $_newUser = $_userManager->createUser($_firstName,$_lastName,$_mail,$_password);

                     // test doublon
                     if ($_newUser->verificationDoublonMail()){
                            $_SESSION["errInscription"]            = 1;
                            header('location: inscription');
                            exit(); 
                     }
              
                    // tous est ok on creer l'utilisateur
                    if($_newUser->enregistrer())
                    {
                            $_SESSION["errInscription"]            = 4;
                    }
                    else
                    {
                            $_SESSION["errInscription"]            = 5;
                    }

              }

              require("view/inscriptionView.php");
       }

       