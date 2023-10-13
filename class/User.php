<?php 

require_once("./class/Security.php");
require_once("./model/Manager.php");

class User extends Manager {

    private $_id;
    private $_firstName;
    private $_lastName;
    private $_mail;
    private $_password;
    private $_secret;

    public function getId() { return $this->_id; }
    public function getFirstName(){ return $this->_firstName; }
    public function getLastName(){ return $this->_lastName; }
    public function getMail() { return $this->_mail; }
    public function getPassword() {return $this->_password; }
    public function getSecret() {return $this->_secret; }

    private function setId($id) { $this->_id = $id; }
    private function setFirstName($firstName){ $this->_firstName = $firstName; }
    private function setLastName($lastName){ $this->_lastName = $lastName; }
    private function setMail($mail) { $this->_mail = $mail; }
    private function setPassword($Password) { $this->_password = $Password; }
    private function setSecret($Secret) { $this->_secret = $Secret; }

    public function __construct($firstName,$lastName, $mail, $Password, $id = 0, $secret = 0)
    {
        $_ln  = htmlspecialchars($lastName);
        $_fn  = htmlspecialchars($firstName);
        $_ml  = htmlspecialchars($mail);
        $_psw = htmlspecialchars($Password);
        $_id  = htmlspecialchars($id);
        $_sct = htmlspecialchars($secret);


        $this->setFirstName($_fn);
        $this->setLastName($_ln);
        $this->setMail($_ml);
        $this->setPassword($_psw);
        $this->setId($_id);
        $this->setSecret($_sct);
    }

    public function enregistrer()
    {

        $bdd = $this->getConnection();

        if($this->verificationDoublonMail($this->getMail()))
        {
            return false;
        }

        // generation secret
        $this->setSecret(Security::genereSecret($this->getMail()));

        $req = $bdd->prepare("INSERT INTO users(first_name, last_name, email, password, secret) VALUES(?,?, ?, ?, ?)");
        $req->execute([$this->getFirstName(), $this->getLastName(), $this->getMail(), $this->getPassword(), $this->getSecret()]);

        return true;

    }

    public function creerLesSessions()
    {
        $_SESSION["connect"]     = true;
        $_SESSION["idUser"]      = $this->getId();
        $_SESSION["firstName"]   = $this->getFirstName();
        $_SESSION["lastName"]    = $this->getLastName();
        $_SESSION["email"]       = $this->getMail();
    }

    public function verificationDoublonMail()
    {
       
        $bdd = $this->getConnection();

        $req = $bdd->prepare("SELECT COUNT(*) AS nb FROM users WHERE email = ?");
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
}
