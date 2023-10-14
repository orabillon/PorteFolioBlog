<?php
    
    require_once("Manager.php");
    
    class MessageManager extends Manager 
    {

        function SaveMessage($firstName, $lastName, $mail, $message)
        {
            $bdd = $this->getConnection();
            $requete = $bdd->prepare('INSERT INTO messages(first_name, last_name, email, content) VALUES (?, ?, ?, ?)');
            $requete->execute([$firstName, $lastName, $mail, $message]);

            return $requete;
        }

    }