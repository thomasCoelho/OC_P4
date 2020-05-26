<?php

require_once 'modele/modele.php';

class AdminWrite extends Modele {

	public function insertAdminWrite($image, $title, $text) {

		$dates = date("Y-m-d");

    	$sql = "INSERT INTO table_billets(billet_date, billet_image, billet_title, billet_text) VALUES(?, ?, ?, ?)";
		
    	$writeBillet = $this->executerRequete($sql, array($dates, $image, $title, $text));
	}
}  