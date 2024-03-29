<?php 

require_once("Manager.php");
require_once("./class/User.php");
require_once("./class/Security.php");

class UserManager extends Manager {

    public function getUsers()
    {
        try
        {
            $bdd = $this->getConnection();
            return $bdd->query('SELECT * FROM users');
        }
        catch (Exception $ex)
        {
            throw new Exception($ex->getMessage());
        }
    }

    public function getUser($id)
    {
       try
       {
            $_id = htmlspecialchars($id);

            $bdd = $this->getConnection();
            $requete = $bdd->prepare('SELECT * FROM users Where id = ?');
            $requete->execute([$_id]);

            while($Result = $requete->fetch())
            {
                return new User($Result["first_name"],$Result["last_name"],$Result["email"],$Result["password"],$Result["id"], $Result["secret"], $Result["admin"], $Result["blocked"]);
            }

            return 0;
        }
        catch (Exception $ex)
        {
            throw new Exception($ex->getMessage());
        }
    }

    public function createUser($firstName, $lastName, $mail, $password)
    { 
        try
        {
            return new User($firstName,$lastName, $mail, $password);
        }
        catch (Exception $ex)
        {
            throw new Exception($ex->getMessage());
        }
    }

    public function searchUser($mail, $password)
    {
        try
        {
            $bdd = $this->getConnection();
            $requete = $bdd->prepare("SELECT COUNT(*) as nb FROM users WHERE email = ?");
            $requete->execute([$mail]);

            while( $Result = $requete->fetch()){
                if($Result["nb"] == 1){

                    $_pass = Security::chiffer($password);
                    $requete2 = $bdd->prepare("SELECT * FROM users WHERE email = ?");
                    $requete2->execute([$mail]);
                    while( $Result = $requete2->fetch())
                    {
                        if($Result["password"] == $_pass)
                        {
                            return new User($Result["first_name"],$Result["last_name"],$Result["email"],$Result["password"],$Result["id"], $Result["secret"], $Result["admin"],$Result["blocked"]);
                        }
                        else{
                            return 0;
                        }
                    }

                }
                else
                {
                    return 0;
                }
            }
        }
        catch (Exception $ex)
        {
            throw new Exception($ex->getMessage());
        }

    }

    public function searchUserCookie($secret)
    {
        try
        {
            $_secret = htmlspecialchars($secret);
            
            $bdd = $this->getConnection();
            $requete = $bdd->prepare("SELECT COUNT(*) as nb FROM users WHERE secret = ?");
            $requete->execute([$_secret]);

            while( $Result = $requete->fetch()){
                if($Result["nb"] == 1){

                
                    $requete2 = $bdd->prepare("SELECT * FROM users WHERE secret = ?");
                    $requete2->execute([$_secret]);
                    while( $Result = $requete2->fetch())
                    {
                        return new User($Result["first_name"],$Result["last_name"],$Result["email"],$Result["password"],$Result["id"],$Result["secret"], $Result["admin"],$Result["blocked"]);
                    }

                }
                else
                {
                    return 0;
                }
            }
        }
        catch (Exception $ex)
        {
            throw new Exception($ex->getMessage());
        }
    }
}
