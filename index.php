<?php

    session_start();

    require("controller/controller.php");
    require("controller/userController.php");
    require("controller/blogController.php");
    require("controller/projetController.php");

   
        try{
            if (isset($_GET["page"])){
                $_page = htmlspecialchars($_GET["page"]);

                switch ($_page) {
                    case "projet":
                        projet();
                        break;

                    case "blog":
                        blog();
                        break;
                
                    case "article":
                        article();
                        break;

                    case "moi":
                        me();
                        break;

                    case "connection":
                        connection();
                        break;
                
                    case "inscription":
                        inscription();
                        break;

                    case "compte":
                        compte();
                        break;

                    case "updateCompte":
                        updateCompte();
                        break;

                    case "updateComptePassword":
                        updateComptePassword();
                        break;
                
                    default:
                        throw new Exception("Cette page n'existe pas ou a été supprimmée !!!");
                        break;
                }            
            }
            else
            {
                me();
            }
        }
        catch(Exception $ex)
        {
            $Error = $ex->getMessage();
            require("view/ErrorView.php");
        }