<?php
    
    require_once("Manager.php");
    
    class CommentManager extends Manager 
    {

        function getListeComment($idArticle)
        {
            try
            {
                $_idArticle = htmlspecialchars($idArticle);

                $bdd = $this->getConnection();
                
                $requete = $bdd->prepare("SELECT users.first_name, users.last_name, comments.content, comments.id_user, comments.id FROM `comments` INNER JOIN `users` ON users.id = comments.id_user WHERE id_article = ? ORDER BY `comments`.id DESC");
                $requete->execute([$_idArticle]);

                return $requete;
            }
            catch (Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }

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

        function deleteAllUserComments($userId)
        {
            $_userId   = htmlspecialchars($userId);

            try
            {
                $bdd = $this->getConnection();
            
                $requete = $bdd->prepare("DELETE FROM `comments` WHERE id_user = ? ");
                $requete->execute([$_userId]);
            }
            catch(Exception $e)
            {
                return false;
            }
            
            return true;
        }

    }