<?php
require_once 'controller/controllerAccueil.php';
require_once 'Vue/vue.php';

class Routeur {

  private $ctrlAccueil;


  public function __construct() {

    if (isset($_GET['action'])){

      if($_GET['action'] == 'Accueil'){
        $this->ctrlAccueil = new ControllerAccueil();
        $this->ctrlAccueil->getAccueil();
      }
    }
      else{
      $this->ctrlAccueil = new ControllerAccueil();
      $this->ctrlAccueil->getAccueil();
    }
}


  function erreur($msgErreur) {
    $vue = new Vue("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }
}
