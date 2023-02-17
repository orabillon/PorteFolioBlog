<?php

require_once('Manager.php');

class UserManager extends Manager {

    public function getUsers() {
        
        $bdd = $this->connection();
        $requete = $bdd->query('SELECT * FROM Users');

        return $requete;

    }

}