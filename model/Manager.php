<?php

class Manager {

    protected function connection() {
        try {
            $bdd = new PDO('mysql:host=localhost:3301;dbname=BlogPorteFolio;charset=utf8', 'root', 'root');
        }
        catch(Exception $e) {
            throw new Exception('Erreur PDO : '.$e->getMessage());
        }

        return $bdd;
    }

}