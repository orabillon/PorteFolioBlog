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

        function ListMessage()
        {
            try
            {
                $bdd = $this->getConnection();
                $requete = $bdd->query('SELECT * FROM messages');
        
                return $requete;
            }
            catch(Exception $ex)
            {
                 throw new Exception($ex->getMessage());
            }
        }

    }