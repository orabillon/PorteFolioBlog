<?php
    
    require_once("Manager.php");
    
    class MessageManager extends Manager 
    {

        function SaveMessage($firstName, $lastName, $mail, $message)
        {
            try
            {
                $bdd = $this->getConnection();
                $requete = $bdd->prepare('INSERT INTO messages(first_name, last_name, email, content) VALUES (?, ?, ?, ?)');
                $requete->execute([$firstName, $lastName, $mail, $message]);

                return $requete;
            }
            catch(Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }
        }

        function getListMessage()
        {
            try
            {
                $bdd = $this->getConnection();
                $requete = $bdd->query('SELECT *, messages.id AS messID FROM messages INNER JOIN message_status ON message_status.id = messages.id_status');
        
                return $requete;
            }
            catch(Exception $ex)
            {
                 throw new Exception($ex->getMessage());
            }
        }

        function deleteMessage($idMessage)
        {
            try
            {
                $_id = htmlspecialchars($idMessage);

                $bdd = $this->getConnection();
                $requete = $bdd->prepare('DELETE FROM messages WHERE id = ?');
                $requete->execute([$_id]);

                return $requete;
            }
            catch(Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }              
        }   

        function updateMessage($idMessage)
        {
            try
            {
                $_id = htmlspecialchars($idMessage);

                $bdd = $this->getConnection();
                $requete = $bdd->prepare('UPDATE messages SET id_status = 2 WHERE id = ?');
                $requete->execute([$_id]);

                return $requete;
            }
            catch(Exception $ex)
            {
                throw new Exception($ex->getMessage());
            }              
        } 
    }


    
    