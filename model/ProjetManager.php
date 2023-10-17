<?php
    
    require_once("Manager.php");
    
    class ProjetManager extends Manager 
    {

        function getListeProjet()
        {
            $bdd = $this->getConnection();
            $requete = $bdd->query("SELECT * FROM projects WHERE display = 1" );
            
            return $requete;
        }

        function getProjet($idProjet)
        {

            $_idProjet = htmlspecialchars($idProjet);

            $bdd = $this->getConnection();

            $requete = $bdd->prepare("SELECT * FROM projects WHERE id = ? ");
            $requete->execute([$_idProjet]);
            
            return $requete;
        }

        function getImageCardProjet($idProjet)
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

        function getListeImagedProjet($idProjet)
        {
            $_idProjet = htmlspecialchars($idProjet);

            $bdd = $this->getConnection();
            
            $requete = $bdd->prepare("SELECT * FROM images WHERE id_project = ? ");
            $requete->execute([$_idProjet]);

            return $requete;

        }

        

    }