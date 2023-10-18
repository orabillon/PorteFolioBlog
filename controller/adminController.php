<?php

require_once("option.php");

       // ROUTEUR 
      
       function admin()
       {
              require("view/adminView.php");  
       }

       function adminDeleteUser()
       {
              try
              {
                     if (!empty($_POST["idDeleteUser"]))
                     {
                            require_once("./model/UserManager.php");

                            $_idUser = htmlspecialchars($_POST["idDeleteUser"]);

                            $_userManager = new UserManager();
                            $user = $_userManager->getUser($_idUser);

                            if(is_object($user))
                            {
                                   // empeche de se suprimmer sois meme, garentit qu'il y aura toujours un admin
                                   if ($user->getId() != $_SESSION["idUser"])
                                   {
                                          $user->deleteAccount();
                                   }
                            }
                     }

                     header("location:admin");
                     exit();
              }
              catch (Exception $ex)
              {
                     throw new Exception($ex->getMessage());
              }
       }

       function adminLockUser()
       {
              try
              {
                     if (!empty($_POST["idLockUser"]))
                     {
                            require_once("./model/UserManager.php");

                            $_idUser = htmlspecialchars($_POST["idLockUser"]);

                            $_userManager = new UserManager();
                            $user = $_userManager->getUser($_idUser);

                            if(is_object($user))
                            {
                                   // empeche de se bloquer sois meme 
                                   if ($user->getId() != $_SESSION["idUser"])
                                   {
                                          $user->blockAccount(1);
                                   }
                            }
                     }

                     header("location:admin");
                     exit();
              }
              catch (Exception $ex)
              {
                     throw new Exception($ex->getMessage());
              }
       }

       function adminUser($admin)
       {
              try
              {
                     if (!empty($_POST["idModifAdminUser"]))
                     {
                            require_once("./model/UserManager.php");

                            $_idUser = htmlspecialchars($_POST["idModifAdminUser"]);
                            $_admin  = htmlspecialchars($admin);

                            $_userManager = new UserManager();
                            $user = $_userManager->getUser($_idUser);

                            if(is_object($user))
                            {
                                   // empeche de se modifier 
                                   if ($user->getId() != $_SESSION["idUser"])
                                   {
                                          $user->AdminAccount($_admin);
                                   }
                            }
                     }

                     header("location:admin");
                     exit();
              }
              catch (Exception $ex)
              {
                     throw new Exception($ex->getMessage());
              }
       }

       function adminUnLockUser()
       {
              try
              {
                     if (!empty($_POST["idUnLockUser"]))
                     {
                            require_once("./model/UserManager.php");

                            $_idUser = htmlspecialchars($_POST["idUnLockUser"]);

                            $_userManager = new UserManager();
                            $user = $_userManager->getUser($_idUser);

                            if(is_object($user))
                            {
                                   $user->blockAccount(0);
                            }
                     }

                     header("location:admin");
                     exit();
              }
              catch (Exception $ex)
              {
                     throw new Exception($ex->getMessage());
              }
       }

       

       
       