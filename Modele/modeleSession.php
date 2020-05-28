<?php

require_once 'modele/modele.php';

class Session extends Modele {

	public function adminIds($pseudo){
		$sql = "SELECT admin_pass FROM table_admin WHERE admin_pseudo = ?";
	    $idConnect = $this->executerRequete($sql, array($pseudo));
	    $varConnect = $idConnect->fetch();
	    return $varConnect['admin_pass'];
	}
}