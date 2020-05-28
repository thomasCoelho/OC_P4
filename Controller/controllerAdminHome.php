<?php 

require_once 'modele/modeleComments.php';
require_once 'modele/modeleContact.php';
require_once 'Vue/vue.php';

class ControllerAdminHome{

	private $controllerModeration;
	private $controllerContact;

	public function __construct() {
    	$this->controllerModeration = new Comments();
    	$this->controllerContact = new Contact();
    }

    function getRead(){
	   	$signalComments = $this->controllerModeration->getSignalComments();
	   	$signalComment = $this->controllerModeration->getSignalComments()->fetch();
	   	$countComments = $this->controllerModeration->countComments()->fetch();
	   	$nbrCommentsDecr = intval($countComments['COUNT(comment_id)']) - 6;
	   	$contacts = $this->controllerContact->getContacts();
	   	$contact = $this->controllerContact->getContacts()->fetch();
		$nbrContacts = $this->controllerContact->countContacts()->fetch();
		$nbrContactsDecr = intval($nbrContacts['COUNT(contact_id)']) - 6;
		if($nbrCommentsDecr < 0){
			$nbrCommentsDecr = 0;
		}
		if($nbrContactsDecr < 0){
			$nbrContactsDecr = 0;
		}
		try {
			$vue = new Vue('AdminHome');
			$vue->generer(array('comments' => $signalComments, 'noComm' => $signalComment, 'nombreComment' => $nbrCommentsDecr, 'contacts' => $contacts, 'noContact' => $contact, 'nombreContact' => $nbrContactsDecr));
		} 
		catch (Exception $e) {
		    echo $e->getMessage(), "\n";
		}
	}

	function safeComment($idComm){
		$this->controllerModeration->safeComment($idComm);
	}

	function deleteComment($idComm){
		$this->controllerModeration->deleteComment($idComm);
	}

	function deleteContact($idContact){
		$this->controllerContact->deleteContact($idContact);
	}

}