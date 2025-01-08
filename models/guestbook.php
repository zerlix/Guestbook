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
    $sql = $this->db->prepare("SELECT * FROM messages ORDER BY gb_id DESC");
    $sql->execute();
    $result = $sql->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }


  // Add a new message to the guestbook table
  public function addMessage($name, $datum, $message) {
    $sql = $this->db->prepare("INSERT INTO messages (name, datum, message) VALUES (?, ?, ?)");
    $sql->bind_param('sss', $name, $datum, $message);
    return $sql->execute();
  }

}