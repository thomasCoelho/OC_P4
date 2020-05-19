<?php 

require_once 'modele/modeleRead.php';
require_once 'vue/vue.php';

class ControllerBillets {

	private $billets;

	public function __construct() {
    	$this->billets = new Billet();
  	}

	function getRead(){
		$billetsGet = $this->billets->getBillets();
		try {
			$vue = new Vue('Read');
			$vue->generer(array('billets' => $billetsGet));
		} 
		catch (Exception $e) {
		    echo $e->getMessage(), "\n";
		}
	}


}