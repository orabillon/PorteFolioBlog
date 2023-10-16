<?php
    
    require_once("Manager.php");
    
    class CategorieManager extends Manager 
    {

        function getListeCategorie()
        {
            $bdd = $this->getConnection();
            return $bdd->query('SELECT * FROM categories');
        }

    }