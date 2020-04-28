<?php

require_once 'Vue/vue.php';


Class ControllerAccueil {

	function getAccueil(){
		try {
	    $vue = new Vue('Accueil');
		$vue->generer(array());
		} 
		catch (Exception $e) {
		    echo $e->getMessage(), "\n";
		}
	}
}