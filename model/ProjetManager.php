<?php
    
    require_once("Manager.php");
    
    class ProjetManager extends Manager 
    {

        function getListeProjet()
        {
            try
            {
                $bdd = $this->getConnection();
                $requete = $bdd->query("SELECT * FROM projects WHERE display = 1" );
            
                return $requete;
            }
            catch (Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }
        }

        function getProjet($idProjet)
        {
            try
            {
                $_idProjet = htmlspecialchars($idProjet);

                $bdd = $this->getConnection();

                $requete = $bdd->prepare("SELECT * FROM projects WHERE id = ? ");
                $requete->execute([$_idProjet]);
                
                return $requete;
            }
            catch (Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }
        }

        function getImageCardProjet($idProjet)
        {
            try
            {
                $_idProjet = htmlspecialchars($idProjet);

                $bdd = $this->getConnection();
                
                $requete = $bdd->prepare("SELECT * FROM images WHERE id_project = ? ");
                $requete->execute([$_idProjet]);

                while($_resultat = $requete->fetch())
                {
                    return $_resultat["image"];
                }

                return null;
            }
            catch (Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }
        }

        function getListeImagedProjet($idProjet)
        {
            try
            {
                $_idProjet = htmlspecialchars($idProjet);

                $bdd = $this->getConnection();
                
                $requete = $bdd->prepare("SELECT * FROM images WHERE id_project = ? ");
                $requete->execute([$_idProjet]);

                return $requete;
            }
            catch (Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }

        }

        function getNumberImages($idProjet)
        {
            try
            {
                $_idProjet = htmlspecialchars($idProjet);

                $bdd = $this->getConnection();
                
                $requete = $bdd->prepare("SELECT COUNT(*) as nb FROM images WHERE id_project = ? ");
                $requete->execute([$_idProjet]);

                while($_resultat = $requete->fetch())
                {
                    return $_resultat["nb"];
                }

                return 0;
            }
            catch (Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }
        }
    }