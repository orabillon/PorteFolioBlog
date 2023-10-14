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


       