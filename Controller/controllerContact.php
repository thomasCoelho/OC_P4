<?php 

require_once 'modele/modeleContact.php';
require_once 'Vue/vue.php';

class ControllerContact{

	private $contact;
	public $contactStatus;
	public $contactCounts;
	public $contactCount;

	function __construct(){
		$this->contact = new Contact();
	}

	function insertContact($email, $prenom, $objet, $message){
		$this->contact->InsertContact($email, $prenom, $objet, $message);
		header('Location: index.php?action=Contact');			
	}

	function stringRemplace($string){		
    	$string = str_replace("'", "\'", $string);
    	return $string;
	}

	function getRead(){
		try {
			$vue = new Vue('Contact');
			$vue->generer(array('contactStatus' => $this->contactStatus));
		} 
		catch (Exception $e) {
		    echo $e->getMessage(), "\n";
		}
	}
}