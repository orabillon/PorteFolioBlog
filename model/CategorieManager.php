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

        function getIdCategorie($categorie)
        {
           try
           {
                $_categorie = htmlspecialchars($categorie);

                $bdd = $this->getConnection();
                $requete = $bdd->prepare('SELECT id FROM categories WHERE categorie = ?');
                $requete->execute([$_categorie]);

                while($result = $requete->fetch())
                {
                    return $result["id"];
                }

           }
           catch (Exception $ex)
            {
                return 0;
            }
        }

    }