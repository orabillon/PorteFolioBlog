<?php
    
    require_once("Manager.php");
    
    class ArticleManager extends Manager 
    {

        function getListeArticle($categorie="Tous")
        {

            $_categorie = htmlspecialchars($categorie);

            $bdd = $this->getConnection();
            $requete = null;

            if($_categorie != 'Tous')
            {
                $requete = $bdd->prepare("SELECT articles.id, articles.content, articles.date_creation, articles.title, articles.description FROM articles INNER JOIN categories ON categories.id = articles.id_category WHERE categories.categorie = ? AND articles.published = 1 ");
                $requete->execute([$_categorie]);
            }
            else
            {
                $requete = $bdd->query("SELECT articles.id, articles.content, articles.date_creation, articles.title, articles.description FROM articles" );
            }

            return $requete;
        }

        function getImageCardArticle($idArticle)
        {
            $_idArticle = htmlspecialchars($idArticle);

            $bdd = $this->getConnection();
            
            $requete = $bdd->prepare("SELECT * FROM images WHERE id_article = ? ");
            $requete->execute([$_idArticle]);

            while($_resultat = $requete->fetch())
            {
                return $_resultat["image"];
            }

            return null;
        }

    }