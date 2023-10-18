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


       