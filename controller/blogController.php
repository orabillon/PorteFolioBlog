<?php
require_once("option.php");

       // ROUTEUR 
       function blog()
       {
              require("view/blogView.php");
       }

       function article()
       {
              if(!empty($_POST["postId"]))
              {
                     $_SESSION["idArticle"] = $_POST["postId"];
              }
              

              require("view/articleView.php"); 
       }

       function addComment()
       {
              if(!empty($_POST["comment"]))
              {
                     try
                     {
                            require_once("./model/CommentManager.php");

                            $_comment = htmlspecialchars($_POST["comment"]);

                            $_commentManager = new CommentManager();
                            $_commentManager->addComment($_SESSION["idArticle"],$_comment);
                     }
                     catch (Exception $ex)
                     {
                            throw new Exception($ex->getMessage());
                     }
              }

              header("location:article");
              exit();
       }

       function deleteComment()
       {
       
              if(!empty($_POST["idCom"]))
              {
                     try
                     {
                            require_once("./model/CommentManager.php");

                            $_idComment = htmlspecialchars($_POST["idCom"]);

                            $_commentManager = new CommentManager();
                            $_commentManager->deleteComment($_idComment);
                     }
                     catch (Exception $ex)
                     {
                            throw new Exception($ex->getMessage());
                     }
              }

              header("location:article");
              exit();
       }

       function blogManagement()
       {
              require("view/managementBlogView.php");
       }

       function deleteArticle()
       {
       
              if(!empty($_POST["idDeleteArticle"]))
              {
                     try
                     {
                            require_once("./model/ArticleManager.php");

                            $_idArticleDelete = htmlspecialchars($_POST["idDeleteArticle"]);

                            $_ArticleManager = new ArticleManager();
                            $_ArticleManager->deleteArticle($_idArticleDelete);

                            // supression des image
                            $_listeImage = $_ArticleManager->getListeImageArticle($_idArticleDelete);
                            
                            while($image = $_listeImage->fetch())
                            {
                                   $_ArticleManager->DeleteImageArticle($image["id"]);

                                   // suppression fichier 
                                   unlink("/opt/lampp/htdocs/PorteFolioBlog/public/Assets/".$image["image"]);
                            }

                            // suppression commentaire

                            require_once("./model/CommentManager.php");

                            $_commentManager     = new CommentManager();
                            $_listeComment       = $_commentManager->getListeComment($_idArticleDelete);

                            while($_comment = $_listeComment->fetch())
                            {
                                   $_commentManager->deleteComment($_comment["id"]);
                            }                            

                     }
                     catch (Exception $ex)
                     {
                            throw new Exception($ex->getMessage());
                     }
              }

              header("location:blogManagement");
              exit();
       }

       function managementArticleView()
       {
             

              require("view/managementArticleView.php"); 
       }

       function createArticle()
       {
              if (!empty($_POST["title"]) && !empty($_POST["description"]) && !empty($_POST["content"]) && !empty($_POST["category"]))
              {
                     try
                     {
                            $_title        = htmlspecialchars($_POST["title"]);
                            $_description  = htmlspecialchars($_POST["description"]);
                            $_content      = htmlspecialchars($_POST["content"]);
                            $_categorie    = htmlspecialchars($_POST["category"]);
                            $_publish      = 0;
                            
                            if (isset($_POST["publish"])){ $_publish = 1; };
                            
                            require_once("./model/ArticleManager.php");

                            $_ArticleManager     = new ArticleManager();

                            $_idArticle = $_ArticleManager->createArticle($_title,$_description,$_content,$_categorie,$_publish);

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
                                                        

                                                               $_ArticleManager->SaveImageArticle($_idArticle,$_nameImageSav,$_FILES["image".$i]["name"]);
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

              header("location:blogManagement");
              exit();
       }

       function editArticle()
       {
              if (!empty($_POST["idEditArticle"]))
              {
                     $_SESSION["idEditArticle"] = $_POST["idEditArticle"];
                     
                     header("location:managementArticleView");
                     exit();
              }
              
              header("location:blogManagement");
              exit();
       }

       function updateArticle()
       {
              if (!empty($_POST["title"]) && !empty($_POST["description"]) && !empty($_POST["content"]) && !empty($_POST["category"]) && !empty($_POST["idEditArticle"]))
              {
                     try
                     {
                            $_title        = htmlspecialchars($_POST["title"]);
                            $_description  = htmlspecialchars($_POST["description"]);
                            $_content      = htmlspecialchars($_POST["content"]);
                            $_categorie    = htmlspecialchars($_POST["category"]);
                            $_publish      = 0;
                            $_idArticle    = htmlspecialchars($_POST["idEditArticle"]);
                            
                            if (isset($_POST["publish"])){ $_publish = 1; };

                            require_once("./model/ArticleManager.php");

                            $_ArticleManager     = new ArticleManager();

                            $_ArticleManager->UpdateArticle($_title,$_description,$_content,$_categorie,$_publish,$_idArticle);

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
                                                        

                                                               $_ArticleManager->SaveImageArticle($_idArticle,$_nameImageSav,$_FILES["image".$i]["name"]);
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

              if (isset($_SESSION["idEditArticle"])){
                     // sinon on n'accede plus a la creation d'un article apres une modification
                     unset($_SESSION["idEditArticle"]);
              }
              
              header("location:blogManagement");
              exit();
       }

       function gestionImageArticle()
       {

              if(!empty($_POST["idEditArticle"]))
              {
                     $_SESSION["idEditArticle"] = $_POST["idEditArticle"];
              }
              

            require("./view/managementBlogGestionImage.php");
       
       }

       function gestionImageArticleDelete()
       {
              if (!empty($_POST["idDeleteImageArticle"]) && !empty($_POST["NameDeleteImageArticle"]) && !empty($_POST["idArticle"]))
              {
                     $_idImage     = htmlspecialchars($_POST["idDeleteImageArticle"]);
                     $_nameImage   = htmlspecialchars($_POST["NameDeleteImageArticle"]);
                     $_idArticle   = htmlspecialchars($_POST["idArticle"]);

                     
                     require_once("./model/ArticleManager.php");

                     $_ArticleManager = new ArticleManager();
                     $_ArticleManager->DeleteImageArticle($_idImage);

                     // suppression fichier 
                     unlink("/opt/lampp/htdocs/PorteFolioBlog/public/Assets/".$_nameImage);   
                     
                     $_SESSION["idEditArticle"] = $_idArticle;
                     
              }

              header("location:gestionImageArticle");
              exit();
       }
       
       