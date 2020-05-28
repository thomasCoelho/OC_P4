<?php

require_once 'Modele/modeleTreatment.php';
require_once 'Vue/vue.php';

Class controllerRegister {

	function getRegister(){
		try {
	    	$vue = new Vue('Register');
			$vue->generer(array($pseudo => $_POST['pseudo-register'], $email => $_POST['email-register'], $password => $pass_hash, $id_groupe => 1));
		} 
		catch (Exception $e) {
		    echo $e->getMessage(), "\n";
		}
	}
}