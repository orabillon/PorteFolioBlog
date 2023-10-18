<?php
    
    require_once("Manager.php");
    
    class ArticleManager extends Manager 
    {

        function getListeArticle($categorie="Tous")
        {

            try 
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
                    $requete = $bdd->query("SELECT articles.id, articles.content, articles.date_creation, articles.title, articles.description FROM articles WHERE published = 1" );
                }

                return $requete;
            }
            catch (Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }
        }

        function getArticle($idArticle)
        {
            try
            {
                $_idArticle = htmlspecialchars($idArticle);

                $bdd = $this->getConnection();
                $requete = null;

                $requete = $bdd->prepare("SELECT articles.id, articles.content, articles.date_creation, articles.title, articles.description FROM articles WHERE articles.id = ? ");
                $requete->execute([$_idArticle]);
                
                return $requete;
            }
            catch (Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }
        }

        function getImageCardArticle($idArticle)
        {
            try
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
            catch (Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }
        }

        function getListeImagedArticle($idArticle)
        {
           try
           {
                $_idArticle = htmlspecialchars($idArticle);

                $bdd = $this->getConnection();
                
                $requete = $bdd->prepare("SELECT * FROM images WHERE id_article = ? ");
                $requete->execute([$_idArticle]);

                return $requete;
            }
            catch (Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }

        }

    }