<?php 

require_once 'Vue/vue.php';

class DisconnectVue{

	function getDisconnect(){
		try {
			$vue = new Vue('Disconnect');
			$vue->generer(array());
		} 
		catch (Exception $e) {
		    echo $e->getMessage(), "\n";
		}
	}
}


class Disconnect{

	function sessionClose(){
		setcookie('idSession', time() + 24*3600, null, null, false, true);
	}
}	