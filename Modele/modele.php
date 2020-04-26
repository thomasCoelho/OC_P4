<?php

abstract class Modele {

  private $bdd;

  protected function executerRequete($sql, $params = null) {
    if ($params == null) {
      $resultat = $this->getBdd()->query($sql);
    }
    else {
      $resultat = $this->getBdd()->prepare($sql);
      $resultat->execute($params);
    }
    return $resultat;
  }

  private function getBdd() {
    if ($this->bdd == null) {
      // Création de la connexion
      try{
        $this->bdd = new PDO('mysql:host=localhost;dbname=forteroche;port=3308;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      }
      catch(Exception $e)
      {
        die('Erreur : '.$e->getMessage());
      }
    }
    return $this->bdd;
  }

}