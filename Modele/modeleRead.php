<?php

require_once 'modele/modele.php';

class Billet extends Modele {

  public function getBillets() {

    $sql = "SELECT billet_id, billet_date, billet_image, billet_title, billet_text FROM table_billets ORDER BY billet_id";
    $billets = $this->executerRequete($sql);
    return $billets;
  }

  public function getBillet($idBillet) {
    $sql = "SELECT billet_id, billet_date, billet_image, billet_title, billet_text, DATE_FORMAT(billet_date, '%d/%m/%Y') as date_fr FROM table_billets WHERE billet_id=?";
    $billet = $this->executerRequete($sql, array($idBillet));
    if ($billet->rowCount() == 1){
      return $billet->fetch();  
    }
    else{
      throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }
  }

  /* EDIT BILLET */
  public function editBillet($image, $title, $text, $id) {
    $dates = date("d-m-Y");

    $sql = "UPDATE table_billets SET billet_date = NOW() , billet_image = ?, billet_title = ?, billet_text = ? WHERE billet_id = ?";
      $newBillet = $this->executerRequete($sql, array($image, $title, $text, $id));    
    }


  public function deleteBillet($id){
    $sql = 'DELETE FROM table_billets WHERE billet_id = "'.$id.'"';
    $deleteComment = $this->executerRequete($sql, array($id));
  }

  /* COMMENTAIRES */

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