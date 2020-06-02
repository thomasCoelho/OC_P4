<?php
require_once 'Controller/controllerBillet.php';
require_once 'Controller/controllerContact.php';
require_once 'Controller/controllerAdmin.php';
require_once 'Controller/controllerSession.php';
require_once 'Controller/controllerCookie.php';
require_once 'Vue/vue.php';

class Routeur {

  private $ctrlAccueil;
  private $ctrlRead;
  private $ctrlBillet;
  private $ctrlTreatmentComments;
  private $ctrlAdminWrite;
  private $ctrlAdminConnect;
  private $ctrlAdminTraitementConnect;
  private $ctrlTraitementAdminWrite;
  private $ctrlUpdateBillet; 
  private $ctrlContact;
  private $ctrlContactTreatment;
  private $ctrlAdminHome;
  private $ctrlDisconnect;
  private $ctrlDisconnectTraitement;
  private $ctrlCookie;

  public function __construct() {
   
    if (isset($_GET['action'])){
      $this->ctrlCookie = new Cookies();

      if($_GET['action'] == 'Accueil'){
        $this->ctrlAccueil = new ControllerAccueil();
        $this->ctrlAccueil->getAccueil();
      }

      if($_GET['action'] == 'Contact'){
        $this->ctrlContact = new ControllerContact();     
        $this->ctrlContact->getRead();
      }

      if ($_GET['action'] == 'ContactTreatment') {
        $this->ctrlContactTreatment = new ControllerContact();
        $this->ctrlContactTreatment->issetContact();
      }

      if ($_GET['action'] == 'Lecture'){        
        $this->ctrlBillet = new ControllerBillet();
        $this->ctrlBillet->signalComment();
        $this->ctrlBillet->deleteComment();
        $this->ctrlBillet->issetBillet();            
        
      }

      if ($_GET['action'] == 'traitementComment'){
          $this->ctrlTreatmentComments = new ControllerBillet();
          $this->ctrlTreatmentComments->issetComments();      
      }  

      if ($_GET['action'] == 'AdminWrite'){
        if($this->ctrlCookie->testCookieConnect() == true){
          $this->ctrlAdminWrite = new ControllerAdminWrite();
          $this->ctrlAdminWrite->getRead();
        }
      }

      if ($_GET['action'] == 'traitementAdminWrite'){
        $this->ctrlUpdateBillet = new ControllerEditBillet();
        $this->ctrlUpdateBillet->getRead();
        $this->ctrlTraitementAdminWrite = new ControllerAdminWrite();
        $this->ctrlTraitementAdminWrite->getRead();
        $this->ctrlTraitementAdminWrite->issetAdminWrite();
      }

      if ($_GET['action'] == 'AdminConnect'){
        $this->ctrlAdminConnect = new ControllerSession();
        $this->ctrlAdminConnect->getRead();
      }

      if ($_GET['action'] == 'traitementAdminConnect'){
        $this->ctrlAdminTraitementConnect = new ControllerSession();
        $this->ctrlAdminTraitementConnect->isIdsCorrect();
      }

      if($_GET['action'] == 'AdminHome'){
        if(isset($_COOKIE['idSession']) AND $_COOKIE['idSession'] != NULL){
          if($_SESSION['pseudo'] == $_COOKIE['idSession']){ 
            $this->ctrlAdminHome = new ControllerAdminHome();
                   
            }
            $this->ctrlAdminHome->getRead();
          }
        else{
          header('Location:index.php?action=AdminConnect');
        }
      }  

      if ($_GET['action'] == 'Deconnection') {
        $this->ctrlDisconnect = new DisconnectVue();
        $this->ctrlDisconnect->getDisconnect();
        setcookie('wrongPass', "", time() + 15, null, null, false, true);
      }

      if ($_GET['action'] == 'DeconnectionTraitement') {
        setcookie('idSession',"", time() + 24*3600, null, null, false, true);
        header('Location:index.php?action=Accueil');
      }
    } else{
      header('Location:index.php?action=Accueil');
    }
  }
}