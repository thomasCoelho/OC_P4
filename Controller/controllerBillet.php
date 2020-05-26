<?php

require_once 'modele/modeleRead.php';
require_once 'modele/modeleComments.php';
require_once 'Vue/vue.php';

class ControllerBillet {

	private $billet;
	private $comments;

	function __construct(){
		$this->billet = new Billet();
		$this->comments = new Comments();
	}


  	function issetComments($pseudo, $text, $idBillet){
		if(isset($pseudo, $text, $idBillet)){			
			$this->comments->insertComment($pseudo, $text, $idBillet);
			header('Location: index.php?action=Lecture&id='.$idBillet);
		}
		else{
			header('Location: index.php?action=Lecture&id='.$idBillet);	
		}
	}

	function getRead($idBillet){
		$billet = $this->billet->getBillet($idBillet);
		$comments = $this->comments->getComments($idBillet);
		
		try {
			$vue = new Vue('Billet');
			$vue->generer(array('billet' => $billet, 'comments' => $comments));
		} 
		catch (Exception $e) {
		    echo $e->getMessage(), "\n";
		}
	}

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