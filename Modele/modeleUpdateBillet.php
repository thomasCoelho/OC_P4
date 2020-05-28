<?php

require_once 'modele/modele.php';

class EditBillets extends Modele {

	public function editBillet($image, $title, $text, $id) {

		$dates = date("d-m-Y");

	    $sql = "UPDATE table_billets SET billet_date = NOW() , billet_image = ?, billet_title = ?, billet_text = ? WHERE billet_id = ?";
	    $newBillet = $this->executerRequete($sql, array($image, $title, $text, $id));    
    }


	public function deleteBillet($id){
		$sql = 'DELETE FROM table_billets WHERE billet_id = "'.$id.'"';
		$deleteComment = $this->executerRequete($sql, array($id));
	}
}