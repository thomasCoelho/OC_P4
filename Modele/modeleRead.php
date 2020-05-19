<?php

require_once 'modele/modele.php';

class Billet extends Modele {

  // Renvoie la liste des billets du blog
  public function getBillets() {


    $sql = "SELECT billet_id, billet_date, billet_title, billet_text FROM table_billets ORDER BY billet_id LIMIT 4";
    $billets = $this->executerRequete($sql);
    return $billets;
  }

  public function getBillet($idBillet) {
    $sql = 'SELECT billet_id, billet_date, billet_title, billet_text FROM table_billets WHERE billet_id=?';
    $billet = $this->executerRequete($sql, array($idBillet));
    if ($billet->rowCount() == 1)
      return $billet->fetch();  
    else
      throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }
}