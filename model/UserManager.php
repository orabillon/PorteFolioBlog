<?php 

require_once("Manager.php");
require_once("./class/User.php");
require_once("./class/Security.php");

class UserManager extends Manager {

    public function getUsers()
    {
        $bdd = $this->getConnection();
        return $bdd->query('SELECT * FROM users');
    }

    public function createUser($firstName, $lastName, $mail, $password)
    { 
        return new User($firstName,$lastName, $mail, $password);
    }

    public function searchUser($mail, $password)
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
                        return new User($Result["first_name"],$Result["last_name"],$Result["email"],$Result["password"]);
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
}
