<?php

require_once 'modele/modeleUpdateBillet.php';
require_once 'modele/modeleComments.php';
require_once 'modele/modeleRead.php';
require_once 'Vue/vue.php';

class ControllerUpdateBillet {

	private $update;
	private $billet;
	private $comment;

	function __construct(){
		$this->update = new EditBillets();
		$this->billet = new Billet();
		$this->comment = new Comments();
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

	function editBillet($image, $title, $text, $id){
		if(isset($image, $title, $text, $id)){
			$this->update->editBillet($image, $title, $text, $id);
		}
	}

	function stringRemplaceP($string){		
    	$string = str_replace(array('<p>','</p>' ), "", $string);
    	return $string;
	}

	function deleteBillet($id){
		$this->update->deleteBillet($id);
		$this->comment->deleteComments($id);
	}

}	