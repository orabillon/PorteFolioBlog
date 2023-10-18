<?php

require_once("option.php");

       // ROUTEUR 
      
       function compte()
       {
              require("view/compteView.php");  
       }

       function inscription()
       {
              try
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
                            if ($_newUser->verifyDuplicateMail()){
                                   $_SESSION["errInscription"]            = 1;
                                   header('location: inscription');
                                   exit(); 
                            }
                     
                     // tous est ok on creer l'utilisateur
                     if($_newUser->save())
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
              catch (Exception $ex)
              {
                     throw new Exception($ex->getMessage());
              }
       }

       function updateCompte()
       {
              try
              {
                     if(!empty($_POST["firstName"]) && !empty($_POST["lastName"]) && !empty($_POST["email"]))
                     {
                            require_once("./model/UserManager.php");
                            
                            $_userManager = new UserManager();
                            $user = $_userManager->getUser($_SESSION["idUser"]);

                            if(is_object($user))
                            {
                                   //Securisation variable
                                   $_firstName       = htmlspecialchars($_POST["firstName"]);
                                   $_lastName        = htmlspecialchars($_POST["lastName"]);
                                   $_mail            = htmlspecialchars($_POST["email"]);

                                   // Ancienne valeur 
                                   $_odlMail = $user->getMail();

                                   // valeur desirer 
                                   $user->setFirstName($_firstName);
                                   $user->setLastName($_lastName);

                                   if ($_odlMail != $_mail)
                                   {
                                          $user->setMail($_mail);

                                          // test mail
                                          if (!filter_var($_mail, FILTER_VALIDATE_EMAIL)) 
                                          {
                                                 $_SESSION["cptModif"] = 3;
                                                 header('location: compte');
                                                 exit();
                                          }

                                          if($user->verifyDuplicateMail())
                                          {
                                                 $_SESSION["cptModif"] = 2;
                                                 header('location: compte');
                                                 exit(); 
                                          }
                                   }
                                   
                                   
                                   if($user->update())
                                   {
                                          $_SESSION["cptModif"] = 1;
                                   }
                                   else
                                   {
                                          $_SESSION["cptModif"] = 4;
                                   }
                            }
                     }

                     header("location:compte");
                     exit();
              }
              catch (Exception $ex)
              {
                     throw new Exception($ex->getMessage());
              }
       }

       function updateComptePassword()
       {
              try
              {
                     if(!empty($_POST["password"]) && !empty($_POST["password2"]))
                     {
                            require_once("./model/UserManager.php");
                            
                            $_userManager = new UserManager();
                            $user = $_userManager->getUser($_SESSION["idUser"]);

                            if(is_object($user))
                            {
                                   $_password  = htmlspecialchars($_POST["password"]);
                                   $_password2 = htmlspecialchars($_POST["password2"]);

                                   if ($_password != $_password2)
                                   {
                                          $_SESSION["pwdModif"] = 2;
                                          header("location:compte");
                                          exit();
                                   }

                                   $_password = Security::chiffer($_password);

                                   $user->setPassword($_password);

                                   if($user->update())
                                   {
                                          $_SESSION["pwdModif"] = 1;
                                   }
                                   else
                                   {
                                          $_SESSION["pwdModif"] = 3;
                                   }

                            }
                     }

                     header("location:compte");
                     exit();
              }
              catch (Exception $ex)
              {
                     throw new Exception($ex->getMessage());
              }
       }

       function blockAccount($block)
       {
              try
              {
                     require_once("./model/UserManager.php");
                     
                     $_block = htmlspecialchars($block);
                     
                     $_userManager = new UserManager();
                     $user = $_userManager->getUser($_SESSION["idUser"]);

                     if(is_object($user))
                     {
                            $user->blockAccount($_block);

                     }

                     header("location:logout.php");
                     exit();
              }
              catch (Exception $ex)
              {
                     throw new Exception($ex->getMessage());
              }
       }

       function deleteAccount()
       {
              try
              {
                     require_once("./model/UserManager.php");
                            
                     $_userManager = new UserManager();
                     $user = $_userManager->getUser($_SESSION["idUser"]);

                     if(is_object($user))
                     {
                            $user->deleteAccount();

                     }

                     header("location:logout.php");
                     exit();
              }
              catch (Exception $ex)
              {
                     throw new Exception($ex->getMessage());
              }
       }
       