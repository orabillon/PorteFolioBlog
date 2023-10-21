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


       