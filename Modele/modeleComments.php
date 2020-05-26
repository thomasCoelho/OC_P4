<?php

require_once 'modele/modele.php';

class Comments extends Modele {	

	public function insertComment($pseudo, $text, $idBilletComment){
		$sql = "INSERT INTO table_comments(comment_pseudo, comment_text, comment_date, id_billet_comment) VALUES('".$pseudo."', '".$text."', NOW() , '".$idBilletComment."')";

		$insertComment = $this->executerRequete($sql, array($pseudo, $text, $idBilletComment));
		return $insertComment;
	}

	public function getComments($idBillet){
		$sql = "SELECT comment_id, comment_pseudo, comment_text, comment_date, comment_signal, id_billet_comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%i') as comment_date_fr FROM table_comments WHERE id_billet_comment = $idBillet ORDER BY comment_id DESC";

		$readComments = $this->executerRequete($sql, array($idBillet));
      	return $readComments;  
	}

	public function signalComment($idComment){
		$sql = "UPDATE table_comments SET comment_signal = 1 WHERE comment_id = ?";
	    $newBillet = $this->executerRequete($sql, array($idComment));    
    }

    public function getSignalComments(){
    	$sql = "SELECT comment_id, comment_pseudo, comment_text, comment_date, comment_signal, id_billet_comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%i') as comment_date_fr FROM table_comments WHERE comment_signal = 1";

    	$readSignalComments = $this->executerRequete($sql);
      	return $readSignalComments;  
    }

    function countComments(){
		$sql = 'SELECT COUNT(comment_id) FROM table_comments WHERE comment_signal = 1';
		$countComments = $this->executerRequete($sql);
		return $countComments;
	}

    public function safeComment($idComment){
    	$sql = "UPDATE table_comments SET comment_signal = 0 WHERE comment_id = ?";
	    $newSafeComment = $this->executerRequete($sql, array($idComment)); 
    }

	public function deleteComment($idComment){
		$sql = 'DELETE FROM table_comments WHERE comment_id = "'.$idComment.'"';
		$deleteComment = $this->executerRequete($sql, array($idComment));
	}

	public function deleteComments($idBillet){
		$sql = 'DELETE FROM table_comments WHERE id_billet_comment = "'.$idBillet.'"';
		$deleteComment = $this->executerRequete($sql, array($idComment));
	}
}	


