<?php

require_once 'Model/modeleRead.php';
require_once 'Vue/vue.php';

class ControllerBillet {

	private $billet;
	private $comments;

	function __construct(){
		$this->billet = new Billet();
		$this->comments = new Billet();
	}


  	function issetComments($pseudo, $text, $idBillet){
		if(isset($pseudo, $text, $idBillet)){			
			$this->comments->insertComment(addslashes(htmlspecialchars($_POST['user-pseudo'])),addslashes(htmlspecialchars($_POST['user-text'])), addslashes(htmlspecialchars($_POST['billet-id'])));
			header('Location: index.php?action=Lecture&id='.$idBillet);
		}
		else{
			header('Location: index.php?action=Lecture&id='.$idBillet);	
		}
	}

	function getReadBillet($idBillet){
		$billet = $this->billet->getBillet($idBillet);
		$comments = $this->comments->getComments($idBillet);
		$billetsGet = $this->billet->getBillets();		
		try {
			$vue = new Vue('Billet');
			$vue->generer(array('billet' => $billet, 'comments' => $comments));
		} 
		catch (Exception $e) {
		    echo $e->getMessage(), "\n";
		}
	}

	function getReadBillets(){
		$billetsGet = $this->billet->getBillets();	
		try {
			$vue = new Vue('Read');
			$vue->generer(array('billets' => $billetsGet));
		} 
		catch (Exception $e) {
		    echo $e->getMessage(), "\n";
		}
	}

	/* EDIT COMMENTS */

	function signalComment($idComment){
		$this->comments->signalComment($idComment);
	}

	function safeComment($idComment){
		$this->comments->safeComment($idComment);
	}

	function deleteComment($idComment){
		$this->comments->deleteComment($idComment);
	}
}

class ControllerEditBillet {
	/* EDIT BILLET */

	function editBillet($image, $title, $text, $id){
		if(isset($image, $title, $text, $id)){
			$this->billet->editBillet($image, $title, $text, $id);
		}
	}

	function stringRemplaceP($string){		
    	$string = str_replace(array('<p>','</p>' ), "", $string);
    	return $string;
	}

	function deleteBillet($id){
		$this->billet->deleteBillet($id);
		$this->comments->deleteComments($id);
	}

	function getRead($idBillet){
		$billet = $this->billet->getBillet($idBillet);
		try {
			$vue = new Vue('EditBillet');
			$vue->generer(array('billet' => $billet));
		} 
		catch (Exception $e) {
		    echo $e->getMessage(), "\n";
		}
	}

	
}
