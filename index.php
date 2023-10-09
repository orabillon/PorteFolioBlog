<?php
   require("controller/controller.php");
   
    try{
        if (isset($_GET["page"])){
            $_page = htmlspecialchars($_GET["page"]);
    
            if ($_page == "projet"){
                home();
            }
            else if ($_page == "blog"){
                blog();
            }
            else if ($_page == "moi"){
                me();
            }
            else{
                throw new Exception("Cette page n'existe pas ou a été supprimmée !!!");
            }
        }
        else
        {
            me();
        }
    }
    catch(Exception $ex){
       // Die("Erreur : ".$ex->getMessage());
       $Error = $ex->getMessage();
       require("view/ErrorView.php");
    }