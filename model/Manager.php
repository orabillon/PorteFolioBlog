<?php 

Class Manager {

    protected function getConnection()
    {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=portefolio_blog;charset=utf8', 'root', '');
        }
        catch(Exception $e) {
            throw new Exception("Problème de connection");
        }

        return $bdd;
    }
}