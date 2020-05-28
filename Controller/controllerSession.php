<?php 

require_once 'modele/modeleSession.php';
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

	function isIdsCorrect($pseudo, $pass){
		if($pseudo != null){
			$this->session->adminIds($pseudo);
			$tr = $this->session->adminIds($pseudo);
			$passSecure = htmlspecialchars($_POST['password-connect']);
			$passok = password_verify($passSecure, $tr);
			if ($passok) {
		        $_SESSION['pseudo'] = $pseudo;
		        header('Location: index.php?action=AdminHome');
		        return true;	        
		    }
		    else {
		    	return false;
		    }
		}
	}
}