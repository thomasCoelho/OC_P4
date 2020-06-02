<?php 

require_once 'Model/modeleSession.php';
require_once 'Vue/vue.php';

class ControllerSession{
	private $session;
	private $tablePassword;
	public $testPass;

	function __construct(){
		$this->session = new Session();
	}

	function getRead(){
		try {
			$vue = new Vue('AdminConnect');
			$vue->generer(array());
		} 
		catch (Exception $e) {
		    echo $e->getMessage(), "\n";
		}
	}

	public $isPasswordCorrect;

	function isIdsCorrect(){
		if(isset($_POST['pseudo-connect']) AND isset($_POST['password-connect'])){
        	$pseudo = htmlspecialchars($_POST['pseudo-connect']);
        	$password = htmlspecialchars($_POST['password-connect']);
			if($pseudo != null AND $password != null){
				$this->session->adminIds($pseudo);
				$pseudoTest = $this->session->adminIds($pseudo);
				$passSecure = htmlspecialchars($_POST['password-connect']);
				$passok = password_verify($passSecure, $pseudoTest);
				if ($passok) {
			        $_SESSION['pseudo'] = $pseudo;
			        header('Location: index.php?action=AdminHome');			        
			        setcookie('idSession', $pseudo, time() + 24*3600, null, null, false, true);
        			return true;
        		}
          		else{
           			header('Location: index.php?action=AdminConnect');
            		setcookie('wrongPass','Mauvais identifiants',time() + 15, null, null, false, true);
          		} 
            }   	        
			else {
			    	return false;
			}
		}
	}
}


/*deconnection  */

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