<?php

    session_start();

    require("controller/controller.php");
    require("controller/userController.php");
    require("controller/blogController.php");
    require("controller/projetController.php");
    require("controller/adminController.php");

   
        try{
            if (isset($_GET["page"])){
                $_page = htmlspecialchars($_GET["page"]);

                switch ($_page) {

                    case "listeProjet":
                        listeProjet();
                        break;

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

                    case "deleteAccount":
                        deleteAccount();
                        break;

                    case "addComment":
                        addComment();
                        break;

                    case "deleteComment":
                        deleteComment();
                        break;
                
                    case "admin":
                        admin();
                        break;

                    case "deleteUserAdmin":
                        adminDeleteUser();
                        break;

                    case "lockUserAdmin":
                        adminLockUser();
                        break;

                    case "unLockUserAdmin":
                        adminUnLockUser();
                        break;

                    case "addUserAdmin":
                        adminUser(1);
                        break;


                    case "delUserAdmin":
                        adminUser(0);
                        break;

                    case "deleteMessage":
                        deleteMessage();
                        break;

                    case "updateMessage":
                        updateMessage();
                        break;

                    case "blogManagement":
                        blogManagement();
                        break;
                    
                    case "deleteArticle":
                        deleteArticle();
                        break;

                    case "managementArticleView":
                        managementArticleView();
                        break;

                    case "createArticle";
                        createArticle();
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
            require("view/errorView.php");
        }