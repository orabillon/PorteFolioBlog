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
                     require_once("./model/ArticleManager.php");

                     $_comment = htmlspecialchars($_POST["comment"]);

                     $_articleManager = new ArticleManager();
                     $_articleManager->addComment($_SESSION["idArticle"],$_comment);
              }

              header("location:article");
              exit();
       }

       function deleteComment()
       {
       
               if(!empty($_POST["idCom"]))
              {
                     require_once("./model/ArticleManager.php");

                     $_idComment = htmlspecialchars($_POST["idCom"]);

                     $_articleManager = new ArticleManager();
                     $_articleManager->deleteComment($_idComment);
              }

              header("location:article");
              exit();
       }


       