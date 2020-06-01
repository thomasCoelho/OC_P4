<?php 

require_once 'Model/modeleContact.php';
require_once 'Vue/vue.php';

class ControllerContact{

	private $contact;
	public $contactStatus;
	public $contactCounts;
	public $contactCount;

	function __construct(){
		$this->contact = new Contact();
	}

	function issetContact(){
		if(isset($_POST['email-contact'], $_POST['name-contact'], $_POST['subject-contact'], $_POST['message-contact'])){			
			function stringRemplace($string){		
		    	$string = str_replace("'", "\'", $string);
		    	return $string;
			}
			$this->contact->InsertContact(stringRemplace($_POST['email-contact']), stringRemplace($_POST['name-contact']), stringRemplace($_POST['subject-contact']), stringRemplace($_POST['message-contact']));
			header('Location: index.php?action=Contact');			
		}
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
	/*GET ACCUEIL */

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