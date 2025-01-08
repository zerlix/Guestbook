<?php
/*
  * GuestbookMessages class
  * 
  * This class is used to interact with the guestbook table in the database.
  * It contains methods to get all messages and add a new message.
  */

class GuestbookMessages {
  
  private $db;

  public function __construct($database) {
    $this->db = $database;
  }

  // Get all messages from the guestbook table
  public function getMessages() {
    $sql = $this->db->prepare("SELECT * FROM guestbook ORDER BY id DESC");
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
  }

  // Add a new message to the guestbook table
  public function addMessage($name, $datum, $message) {
    $sql = $this->db->prepare("INSERT INTO guestbook (name, datum, message) VALUES (:name, :datum, :message)");
    $sql->bindParam(':name', $name);
    $sql->bindParam(':datum', $datum);
    $sql->bindParam(':message', $message);
    return $sql->execute();
  }

}