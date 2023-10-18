<?php 

require_once("./class/Security.php");
require_once("./model/Manager.php");
require_once("./model/CommentManager.php");

class User extends Manager {

    private $_id;
    private $_firstName;
    private $_lastName;
    private $_mail;
    private $_password;
    private $_secret;
    private $_blocked;
    private $_admin;

    public function getId() { return $this->_id; }
    public function getFirstName(){ return $this->_firstName; }
    public function getLastName(){ return $this->_lastName; }
    public function getMail() { return $this->_mail; }
    public function getPassword() {return $this->_password; }
    public function getSecret() {return $this->_secret; }
    public function getBlocked() {return $this->_blocked; }
    public function getAdmin() {return $this->_admin; }

    private function setId($id) { $this->_id = $id; }
    public function setFirstName($firstName){ $this->_firstName = $firstName; }
    public function setLastName($lastName){ $this->_lastName = $lastName; }
    public function setMail($mail) { $this->_mail = $mail; }
    public function setPassword($Password) { $this->_password = $Password; }
    private function setSecret($Secret) { $this->_secret = $Secret; }
    private function setBlocked($blocked) {$this->_blocked = $blocked;}
    private function setAdmin($admin) {$this->_admin = $admin;}

    public function __construct($firstName,$lastName, $mail, $Password, $id = 0, $secret = 0, $admin = 0, $blocked = 0)
    {
        $_ln  = htmlspecialchars($lastName);
        $_fn  = htmlspecialchars($firstName);
        $_ml  = htmlspecialchars($mail);
        $_psw = htmlspecialchars($Password);
        $_id  = htmlspecialchars($id);
        $_sct = htmlspecialchars($secret);
        $_adm = htmlspecialchars($admin);
        $_blk = htmlspecialchars($blocked);


        $this->setFirstName($_fn);
        $this->setLastName($_ln);
        $this->setMail($_ml);
        $this->setPassword($_psw);
        $this->setId($_id);
        $this->setSecret($_sct);
        $this->setAdmin($_adm);
        $this->setBlocked($_blk);
    }

    public function save()
    {

        $bdd = $this->getConnection();

        if($this->verifyDuplicateMail($this->getMail()))
        {
            return false;
        }

        try{
            // generation secret
            $this->setSecret(Security::generateSecret($this->getMail()));

            $req = $bdd->prepare("INSERT INTO users(first_name, last_name, email, password, secret) VALUES(?,?, ?, ?, ?)");
            $req->execute([$this->getFirstName(), $this->getLastName(), $this->getMail(), $this->getPassword(), $this->getSecret()]);
        }
        catch (Exception $e)
        {
            return false;
        } 

        return true;

    }

    public function update()
    {
       try 
        {
            $bdd = $this->getConnection();

            $req = $bdd->prepare("UPDATE users SET first_name = ?, last_name = ?, email = ?, password = ?, blocked = ?, admin = ? WHERE id = ?");
            $req->execute([$this->getFirstName(), $this->getLastName(), $this->getMail(), $this->getPassword(), $this->getBlocked(), $this->getAdmin() ,$this->getId()]);
        }
        catch (Exception $e)
        {
            return false;
        }   

        return true;
    }

    public function blockAccount($blocked)
    {
        $_blocked = htmlspecialchars($blocked);
        try 
        {
            $this->setBlocked($_blocked);
            $this->update();
        }
        catch (Exception $e)
        {
            return false;
        }   

        return true;
    }

    public function AdminAccount($admin)
    {
        $_admin = htmlspecialchars($admin);
        try 
        {
            $this->setAdmin($_admin);
            $this->update();
        }
        catch (Exception $e)
        {
            return false;
        }   

        return true;
    }

    public function deleteAccount()
    {
        try 
        {
            $bdd = $this->getConnection();

            //suppression des commentaire 
            $_commentManager = new CommentManager();
            $_commentManager->deleteAllUserComments($this->getId());

            // suppression user
            $req = $bdd->prepare("DELETE FROM users WHERE id = ?");
            $req->execute([$this->getId()]);

        }
        catch (Exception $e)
        {
            return false;
        }   

        return true;
    }

    public function createSessions()
    {
        $_SESSION["connect"]     = true;
        $_SESSION["idUser"]      = $this->getId();
        $_SESSION["firstName"]   = $this->getFirstName();
        $_SESSION["lastName"]    = $this->getLastName();
        $_SESSION["email"]       = $this->getMail();
        $_SESSION["admin"]       = $this->getAdmin();
    }

    public function verifyDuplicateMail()
    {
       
        try
        {
        $bdd = $this->getConnection();

        $req = $bdd->prepare("SELECT COUNT(*) AS nb FROM users WHERE email = ? AND blocked = 0");
        $req->execute([$this->getMail()]);

        while($result = $req->fetch())
        {
            if($result["nb"] != 0)
            {
                return true;
            }
        }

        return false;
        }
        catch (Exception $ex)
        {
            return false;
        }
    }
}
