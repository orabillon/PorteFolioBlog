<?php
    
    require_once("Manager.php");
    
    class CategorieManager extends Manager 
    {

        function getListeCategorie()
        {
           try
           {
                $bdd = $this->getConnection();
                return $bdd->query('SELECT * FROM categories');
           }
           catch (Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }
        }

    }