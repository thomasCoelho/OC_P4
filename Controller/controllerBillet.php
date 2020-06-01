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


  	function issetComments(){
		if(isset($_POST['user-pseudo'], $_POST['user-text'], $_POST['billet-id'])){			
			$this->comments->insertComment(addslashes(htmlspecialchars($_POST['user-pseudo'])),addslashes(htmlspecialchars($_POST['user-text'])), addslashes(htmlspecialchars($_POST['billet-id'])));
			header('Location: index.php?action=Lecture&id='.$idBillet);
		}
		else{
			header('Location: index.php?action=Lecture&id='.$idBillet);	
		}
	}
	function issetBillet(){
		if (isset($_GET['id'])) {
        	$idBillet = htmlspecialchars(intval($_GET['id']));
        	if ($idBillet != 0){    
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
		}else{
			$billetsGet = $this->billet->getBillets();	
			try {
				$vue = new Vue('Read');
				$vue->generer(array('billets' => $billetsGet));
			} 
			catch (Exception $e) {
			    echo $e->getMessage(), "\n";
			}
		}
	}

	/* EDIT COMMENTS */

	function signalComment(){
		if(isset($_GET['comment_id'])){
        	$idComment = htmlspecialchars($_GET['comment_id']);
			$this->comments->signalComment($idComment);
		}
	}

	function safeComment($idComment){
		$this->comments->safeComment($idComment);
	}

	function deleteComment(){
		if(isset($_GET['comment'])){
            $commentId = htmlspecialchars(intval($_GET['comment']));
            if ($commentId != 0) {
				$this->comments->deleteComment($commentId);
			}
		}
	}
}

/* EDIT BILLET */
class ControllerEditBillet {

	function getRead(){
		if (isset($_GET['billet'])){
			$idBillet = htmlspecialchars(intval($_GET['billet']));
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

	

	
}
