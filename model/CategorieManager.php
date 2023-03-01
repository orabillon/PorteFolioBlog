<?php

require_once('Manager.php');

class CategorieManager extends Manager {

    public function getCategories() {

        $bdd = $this->connection();
        $requete = $bdd->query('SELECT idTheme, theme, url FROM `Theme`');

        return $requete;

    }
}