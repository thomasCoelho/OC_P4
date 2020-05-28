<?php 

require_once 'modele/modeleAdminWrite.php';
require_once 'Vue/vue.php';

class ControllerAdminWrite{

	private $contenuAdmin;

	public function __construct() {
    	$this->contenuAdmin = new AdminWrite();
	}

	function getRead(){
		try {
			$vue = new Vue('AdminWrite');
			$vue->generer(array());
		} 
		catch (Exception $e) {
		    echo $e->getMessage(), "\n";
		}
	}

	function stringRemplace($string){		
    	$string = str_replace("'", "\'", $string);
    	return $string;
	}

	function stringRemplaceP($string){		
    	$string = str_replace(array('<p>','</p>' ), "", $string);
    	return $string;
	}


	function issetAdminWrite($image, $title, $text){
		if(isset($_POST['img-admin-write'], $_POST['title-admin-write'], $_POST['text-admin-write']) AND strlen($_POST['img-admin-write']) AND strlen($_POST['title-admin-write']) !=0 AND strlen($_POST['text-admin-write'])){		
			$this->contenuAdmin->insertAdminWrite($image, $title, $text);
		}
		else{
			header('location: index.php?action=AdminWrite');
		}
	}
}