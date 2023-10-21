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

        function getNumberImages($idArticle)
        {
            try
            {
                $_idArticle = htmlspecialchars($idArticle);

                $bdd = $this->getConnection();
                
                $requete = $bdd->prepare("SELECT COUNT(*) as nb FROM images WHERE id_article = ? ");
                $requete->execute([$_idArticle]);

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

        function getListeArticleManagement()
        {

            try 
            {
                $bdd = $this->getConnection();
                $requete =  $bdd->query("SELECT articles.id, articles.content, articles.date_creation, articles.date_update, articles.title, articles.description, articles.published, categories.categorie FROM articles INNER JOIN categories ON categories.id = articles.id_category" );
        
                return $requete;
            }
            catch (Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }
        }

        function deleteArticle($idArticle)
        {

            try 
            {
                $_idArticle = htmlspecialchars($idArticle);

                $bdd = $this->getConnection();
                $requete =  $bdd->prepare("DELETE FROM articles WHERE id = ?" );
                $requete->execute([$_idArticle]);
        
                return $requete;
            }
            catch (Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }
        }

        function CreateArticle($title, $description, $content, $categorie, $publish)
        {

            try 
            {
                $_title = htmlspecialchars($title);
                $_description = htmlspecialchars($description);
                $_content = htmlspecialchars($content);
                $_categorie = htmlspecialchars($categorie);
                $_publish = htmlspecialchars($publish);

                $bdd = $this->getConnection();
                $requete =  $bdd->prepare("INSERT INTO articles(title, description, content, id_category, published) VALUE (?, ?, ?, ?, ?)" );
                $requete->execute([$_title, $_description, $_content, $_categorie, $_publish]);

                $requete = $bdd->prepare("SELECT id FROM articles WHERE title = ? AND description = ? AND content = ? AND id_category = ? AND published = ?");
                $requete->execute([$_title, $_description, $_content, $_categorie, $_publish]);

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
        
        function SaveImageArticle($idArticle, $nameImage)
        {

            try 
            {
                $_id = htmlspecialchars($idArticle);
                $_nameImage = htmlspecialchars($nameImage);

                $bdd = $this->getConnection();
                $requete =  $bdd->prepare("INSERT INTO images(id_article,image) VALUE (?, ?)" );
                $requete->execute([$_id, $_nameImage]);

            }
            catch (Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }
        }

        function DeleteImageArticle($idImage)
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
    }