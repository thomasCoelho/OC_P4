<?php

require_once 'modele/modele.php';

class Contact extends Modele {

	function InsertContact($email, $prenom, $objet, $message){
		$sql = "INSERT INTO table_contact(contact_email, contact_prenom, contact_objet, contact_message) VALUES('".$email."', '".$prenom."', '".$objet."', '".$message."')";

		$insertContact = $this->executerRequete($sql, array($email, $prenom, $objet, $message));
		return $insertContact;
	}

	function getContacts(){
		$sql = "SELECT contact_id, contact_email, contact_prenom, contact_objet, contact_message FROM table_contact LIMIT 6";

		$readContact = $this->executerRequete($sql);
      	return $readContact; 
	}

	function countContacts(){
		$sql = 'SELECT COUNT(contact_id) FROM table_contact';
		$countContact = $this->executerRequete($sql);
		return $countContact;
	}

	function deleteContact($idContact){
		$sql = 'DELETE FROM table_contact WHERE contact_id = "'.$idContact.'"';
		$deleteContact = $this->executerRequete($sql, array($idContact));
	}

}