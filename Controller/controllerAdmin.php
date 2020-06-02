<?php 

require_once 'Model/modeleRead.php';
require_once 'Model/modeleContact.php';
require_once 'Model/modeleAdminWrite.php';
require_once 'Vue/vue.php';

class ControllerAdminHome{

	private $controllerModeration;
	private $controllerContact;

	public function __construct() {
    	$this->controllerModeration = new Billet();
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

	function issetAdminHome(){
		if(isset($_GET['contact'])){
	        $idContact = htmlspecialchars(intval($_GET['contact']));
	        $this->ctrlAdminHome->deleteContact($idContact); 
	    }
	    if(isset($_GET['statusComm'], $_GET['comment'])){
	        $idComm = htmlspecialchars($_GET['comment']);
	        if ($_GET['statusComm'] == 'safeComm') {
	            $this->ctrlAdminHome->safeComment($idComm);
	            header('Location:index.php?action=AdminHome');
	        }
	        if ($_GET['statusComm'] == 'deleteComm') {
	            $this->ctrlAdminHome->deleteComment($idComm);
	            header('Location:index.php?action=AdminHome'); 
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
}

	/* ADMIN WRITE */
class ControllerAdminWrite{
	private $contenuAdmin;

	public function __construct() {
    	$this->contenuAdmin = new AdminWrite();
	}

	function getRead(){
		if (!isset($_GET['billet']) AND !isset($_GET['edit'])){
			try {
				$vue = new Vue('AdminWrite');
				$vue->generer(array());
			} 
			catch (Exception $e) {
			    echo $e->getMessage(), "\n";
			}
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

	function issetAdminWrite(){
		if(isset($_POST['img-admin-write'], $_POST['title-admin-write'], $_POST['text-admin-write']) AND strlen($_POST['img-admin-write']) AND strlen($_POST['title-admin-write']) !=0 AND strlen($_POST['text-admin-write']) AND !isset($_GET['billet'])){
			$image = htmlspecialchars($_POST['img-admin-write']);
        	$imageTraited = $this->ctrlTraitementAdminWrite->stringRemplaceP($image);
        	$title = htmlspecialchars($_POST['title-admin-write']);
        	$text = htmlspecialchars($_POST['text-admin-write']);
        	$textTraited = $this->ctrlTraitementAdminWrite->stringRemplace($text);
			$this->contenuAdmin->insertAdminWrite($imageTraited, $title, $textTraited);
		}
		else{
			header('location: index.php?action=AdminWrite');
		}
	}

}
