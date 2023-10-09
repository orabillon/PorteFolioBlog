<?php 

require_once("./model/Manager.php");

class User extends Manager {

    private $_id;
    private $_firstName;
    private $_lastName;
    private $_mail;
    private $_password;

    public function getId() { return $this->_id; }
    public function getFirstName(){ return $this->_firstName; }
    public function getLastName(){ return $this->_lastName; }
    public function getMail() { return $this->_mail; }
    public function getPassword() {return $this->_password; }

    private function setId($id) { $this->_id = $id; }
    private function setFirstName($firstName){ $this->_firstName = $firstName; }
    private function setLastName($lastName){ $this->_lastName = $lastName; }
    private function setMail($mail) { $this->_mail = $mail; }
    private function setPassword($Password) { $this->_password = $Password; }

    public function __construct($firstName,$lastName, $mail, $Password, $id = 0)
    {
        $_ln = htmlspecialchars($lastName);
        $_fn =  htmlspecialchars($firstName);
        $_ml = htmlspecialchars($mail);
        $_psw = htmlspecialchars($Password);
        $_id = htmlspecialchars($id);

        $this->setFirstName($_fn);
        $this->setLastName($_ln);
        $this->setMail($_ml);
        $this->setPassword($_psw);
        $this->setId($_id);
    }

    public function enregistrer()
    {

        $bdd = $this->getConnection();

        $req = $bdd->prepare("SELECT COUNT(*) AS nb FROM users WHERE mail = ?");
        $req->execute([$this->getMail()]);

        while($result = $req->fetch())
        {
            if($result["nb"] != 0)
            {
                return false;
            }
        }

        $req = $bdd->prepare("INSERT INTO users(first_name, last_name, email, password) VALUES(?,?, ?, ?)");
        $req->execute([$this->getFirstName(), $this->getLastName(), $this->getMail(), $this->getPassword()]);

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
}
