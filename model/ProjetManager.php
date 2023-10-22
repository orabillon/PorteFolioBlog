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

        function getListeImageProjet($idProjet)
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

        function getListeProjetManagement()
        {

            try 
            {
                $bdd = $this->getConnection();
                $requete =  $bdd->query("SELECT * FROM projects" );
        
                return $requete;
            }
            catch (Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }
        }

        function deleteProjet($idProjet)
        {

            try 
            {
                $_idProjet = htmlspecialchars($idProjet);

                $bdd = $this->getConnection();
                $requete =  $bdd->prepare("DELETE FROM projects WHERE id = ?" );
                $requete->execute([$_idProjet]);
        
                return $requete;
            }
            catch (Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }
        }

        function DeleteImageProjet($idImage)
        {
            try 
            {
                $_id = htmlspecialchars($idImage);


                $bdd = $this->getConnection();
                $requete =  $bdd->prepare("DELETE FROM images WHERE id = ?" );
                $requete->execute([$_id]);

            }
            catch (Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }
        }

        function UpdateProjet($name, $description, $content, $display, $idProjet)
        {

            try 
            {
                $_name = htmlspecialchars($name);
                $_description = htmlspecialchars($description);
                $_content = htmlspecialchars($content);
                $_display = htmlspecialchars($display);
                $_idProjet = htmlspecialchars($idProjet);

                $bdd = $this->getConnection();
                $requete =  $bdd->prepare("UPDATE projects SET name  = ?, description = ?, content = ?, display = ?, date_update = ? WHERE id = ?" );
                $requete->execute([$_name, $_description, $_content, $_display, date("Y-m-d"), $_idProjet]);

            }
            catch (Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }
        }

        function saveImageProjet($idProjet, $nameImage, $baseName)
        {

            try 
            {
                $_id        = htmlspecialchars($idProjet);
                $_nameImage = htmlspecialchars($nameImage);
                $_baseName  = htmlspecialchars($baseName);

                $bdd = $this->getConnection();
                $requete =  $bdd->prepare("INSERT INTO images(id_project,image,BaseImageName) VALUE (?, ?, ?)" );
                $requete->execute([$_id, $_nameImage,$_baseName]);

            }
            catch (Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }
        }

        function createProjet($name, $description, $content, $display)
        {

            try 
            {
                $_name = htmlspecialchars($name);
                $_description = htmlspecialchars($description);
                $_content = htmlspecialchars($content);
                $_display = htmlspecialchars($display);

                $bdd = $this->getConnection();
                $requete =  $bdd->prepare("INSERT INTO projects(name, description, content, display) VALUE (?, ?, ?, ?)" );
                $requete->execute([$_name, $_description, $_content, $_display]);

                $requete = $bdd->prepare("SELECT id FROM projects WHERE name = ? AND description = ? AND content = ? AND display = ?");
                $requete->execute([$_name, $_description, $_content,$_display]);

                while($result = $requete->fetch())
                {
                    return $result["id"];
                }
            }
            catch (Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }
        }

    }