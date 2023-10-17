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
                $requete = $bdd->query("SELECT articles.id, articles.content, articles.date_creation, articles.title, articles.description FROM articles WHERE published = 1" );
            }

            return $requete;
        }

        function getArticle($idArticle)
        {

            $_idArticle = htmlspecialchars($idArticle);

            $bdd = $this->getConnection();
            $requete = null;

            $requete = $bdd->prepare("SELECT articles.id, articles.content, articles.date_creation, articles.title, articles.description FROM articles WHERE articles.id = ? ");
            $requete->execute([$_idArticle]);
            
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

        function getListeImagedArticle($idArticle)
        {
            $_idArticle = htmlspecialchars($idArticle);

            $bdd = $this->getConnection();
            
            $requete = $bdd->prepare("SELECT * FROM images WHERE id_article = ? ");
            $requete->execute([$_idArticle]);

            return $requete;

        }

        function getListeComment($idArticle)
        {
            $_idArticle = htmlspecialchars($idArticle);

            $bdd = $this->getConnection();
            
            $requete = $bdd->prepare("SELECT users.first_name, users.last_name, comments.content, comments.id_user, comments.id FROM `comments` INNER JOIN `users` ON users.id = comments.id_user WHERE id_article = ? ORDER BY `comments`.id DESC");
            $requete->execute([$_idArticle]);

            return $requete;

        }

        function addComment($idArticle, $comment)
        {
            $_idArticle = htmlspecialchars($idArticle);
            $_comment   = htmlentities($comment); 
            

            try
            {
                $bdd = $this->getConnection();
            
                $requete = $bdd->prepare("INSERT iNTO `comments`(id_user, id_article, content) VALUES (?, ?, ?) ");
                $requete->execute([$_SESSION["idUser"], $_idArticle, $_comment]);
            }
            catch(Exception $e)
            {
                return false;
            }
            
            return true;

           

        }

        function deleteComment($idComment)
        {
            
            $_idComment   = htmlspecialchars($idComment);

            try
            {
                $bdd = $this->getConnection();
            
                $requete = $bdd->prepare("DELETE FROM `comments` WHERE id = ? ");
                $requete->execute([$_idComment]);
            }
            catch(Exception $e)
            {
                return false;
            }
            
            return true;

        }

    }