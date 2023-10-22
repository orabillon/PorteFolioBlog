<?php
require_once("option.php");

       // ROUTEUR 
       function listeProjet()
       {
              require("view/listeProjetView.php");
       }

       function projet()
       {
              if(!empty($_POST["projetId"]))
              {
                     $_SESSION["idProjet"] = $_POST["projetId"];
              }

              require("view/projetView.php");
       }

       function projetManagement()
       {
              require("view/managementProjetView.php");
       }

       function deleteProjet()
       {
              if(!empty($_POST["idDeleteProjet"]))
              {
                     try
                     {
                            require_once("./model/ProjetManager.php");

                            $_idProjetDelete = htmlspecialchars($_POST["idDeleteProjet"]);

                            $_projetManager = new ProjetManager();
                            $_projetManager->deleteProjet($_idProjetDelete); 

                            // supression des image
                            $_listeImage = $_projetManager->getListeImageProjet($_idProjetDelete); 
                            
                            while($image = $_listeImage->fetch())
                            {
                                   $_projetManager->DeleteImageProjet($image["id"]); 

                                   // suppression fichier 
                                   unlink("/opt/lampp/htdocs/PorteFolioBlog/public/Assets/".$image["image"]);
                            }

                     }
                     catch (Exception $ex)
                     {
                            throw new Exception($ex->getMessage());
                     }
              }

              header("location:projetManagement");
              exit();
       }

       function editProjet()
       {
              
              if (!empty($_POST["idEditProjet"]))
              {
                     $_SESSION["idEditProjet"] = $_POST["idEditProjet"];
                     
                     header("location:managementProjetDetailView");
                     exit();
              }
              
              header("location:projetManagement");
              exit();
       }

       function gestionImageProjet()
       {

              if(!empty($_POST["idEditProjet"]))
              {
                     $_SESSION["idEditProjet"] = $_POST["idEditProjet"];
              }
              
            require("./view/managementProjetGestionImage.php");
       
       }

       function updateProjet()
       {
              if (!empty($_POST["name"]) && !empty($_POST["description"]) && !empty($_POST["content"]) && !empty($_POST["idEditProjet"]))
              {
                     try
                     {
                            $_name         = htmlspecialchars($_POST["name"]);
                            $_description  = htmlspecialchars($_POST["description"]);
                            $_content      = htmlspecialchars($_POST["content"]);
                            $_display      = 0;
                            $_idProjet     = htmlspecialchars($_POST["idEditProjet"]);
                            
                            if (isset($_POST["display"])){ $_display = 1; };

                            require_once("./model/ProjetManager.php");

                            $_projetManager     = new ProjetManager();

                            $_projetManager->updateProjet($_name,$_description,$_content,$_display,$_idProjet);

                            // ajout noouvelle image
                            if(count($_FILES) > 0)
                            {
                                   $nombreImage = count($_FILES);
                                   
                                   for ($i = 2; $i <=  1 + $nombreImage; $i++) 
                                   {
                                          echo $_FILES["image".$i]["name"]."<br>";
                                          // gestion de l'image
                                          // test si image
                                          if(isset($_FILES["image".$i]) && $_FILES["image".$i]["error"] === 0)
                                          {
                                                 // test poid
                                                 if($_FILES["image".$i]["size"] <= 3000000)
                                                 {
                                                        //fichier autoriser
                                                        $_informationsImage  = pathinfo($_FILES["image".$i]["name"]);
                                                        $_extentension       = $_informationsImage["extension"];
                                                        $_allowExtension     = ["jpg","jpeg","png"];
                                                        $_nameImageSav       = sha1(time().$_FILES["image".$i]["name"].rand()).".".$_extentension;

                                                        if(in_array($_extentension, $_allowExtension))
                                                        {
                                                               try
                                                               {
                                                                      // Chemin absolue obligatoire sinon marche pas ????
                                                               $_res = move_uploaded_file($_FILES["image".$i]["tmp_name"], '/opt/lampp/htdocs/PorteFolioBlog/public/Assets/'.$_nameImageSav); 
                                                               }
                                                               catch (Exception $e)
                                                               {
                                                                      throw new Exception($e->getMessage());
                                                               }
                                                        

                                                               $_projetManager->saveImageProjet($_idProjet,$_nameImageSav,$_FILES["image".$i]["name"]);
                                                        }
                                                 }
                                          }
                                   }
                            }


                     }
                     catch (Exception $e)
                     {
                            throw new Exception($e->getMessage());
                     }
              }

              if (isset($_SESSION["idEditProjet"])){
                     // sinon on n'accede plus a la creation d'un article apres une modification
                     unset($_SESSION["idEditProjet"]);
              }
              
              header("location:projetManagement");
              exit();
       }

       function createProjet()
       {
              if (!empty($_POST["name"]) && !empty($_POST["description"]) && !empty($_POST["content"]))
              {
                     try
                     {
                            $_name         = htmlspecialchars($_POST["name"]);
                            $_description  = htmlspecialchars($_POST["description"]);
                            $_content      = htmlspecialchars($_POST["content"]);
                            $_display      = 0;
                            
                            if (isset($_POST["display"])){ $_display = 1; };
                            
                            require_once("./model/ProjetManager.php");

                            $_projetManager     = new ProjetManager();

                            $_idProjet = $_projetManager->createProjet($_name,$_description,$_content,$_display);

                            if(count($_FILES) > 0)
                            {
                                   $nombreImage = count($_FILES);
                                   
                                   for ($i = 2; $i <=  1 + $nombreImage; $i++) 
                                   {
                                          echo $_FILES["image".$i]["name"]."<br>";
                                          // gestion de l'image
                                          // test si image
                                          if(isset($_FILES["image".$i]) && $_FILES["image".$i]["error"] === 0)
                                          {
                                                 // test poid
                                                 if($_FILES["image".$i]["size"] <= 3000000)
                                                 {
                                                        //fichier autoriser
                                                        $_informationsImage  = pathinfo($_FILES["image".$i]["name"]);
                                                        $_extentension       = $_informationsImage["extension"];
                                                        $_allowExtension     = ["jpg","jpeg","png"];
                                                        $_nameImageSav       = sha1(time().$_FILES["image".$i]["name"].rand()).".".$_extentension;

                                                        if(in_array($_extentension, $_allowExtension))
                                                        {
                                                               try
                                                               {
                                                                      // Chemin absolue obligatoire sinon marche pas ????
                                                                      $_res = move_uploaded_file($_FILES["image".$i]["tmp_name"], '/opt/lampp/htdocs/PorteFolioBlog/public/Assets/'.$_nameImageSav); 
                                                               }
                                                               catch (Exception $e)
                                                               {
                                                                      throw new Exception($e->getMessage());
                                                               }
                                                        

                                                               $_projetManager->saveImageProjet($_idProjet,$_nameImageSav,$_FILES["image".$i]["name"]);
                                                        }
                                                 }
                                          }
                                   }
                            }
                            
                     }
                     catch (Exception $ex)
                     {
                            throw new Exception($ex->getMessage());
                     }
                    
              }

              header("location:projetManagement");
              exit();
       }


       function gestionImageProjetDelete()
       {
              if (!empty($_POST["idDeleteImageProjet"]) && !empty($_POST["NameDeleteImageProjet"]) && !empty($_POST["idProjet"]))
              {
                     $_idImage     = htmlspecialchars($_POST["idDeleteImageProjet"]);
                     $_nameImage   = htmlspecialchars($_POST["NameDeleteImageProjet"]);
                     $_idProjet    = htmlspecialchars($_POST["idProjet"]);

                     
                     require_once("./model/ProjetManager.php");

                     $_projetManager = new ProjetManager();
                     $_projetManager->deleteImageProjet($_idImage);

                     // suppression fichier 
                     unlink("/opt/lampp/htdocs/PorteFolioBlog/public/Assets/".$_nameImage);      
                     
                     $_SESSION["idEditProjet"] = $_idProjet;
                     
              }

              header("location:gestionImageProjet");
              exit();
       }

       function managementProjetDetailView()
       {
              require("view/managementProjetDetailView.php"); 
       }

       