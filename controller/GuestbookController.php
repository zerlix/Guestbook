<?php

require_once '../config/db.php';
require_once '../models/guestbook.php';



class GuestbookController {
  
  private $model;

  public function __construct($db) {
    $this->model = new GuestbookMessages($db);
  }

  public function index() {
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
      $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
      $datum = filter_input(INPUT_POST, 'datum', FILTER_SANITIZE_SPECIAL_CHARS);
      
      if ($name && $message && $datum) {
        $this->model->addMessage($name, $datum, $message);
      } else {
        // Handle invalid input
        echo "Invalid input.";
      }
    }

    $entries = $this->model->getMessages();
    require '../views/guestbook/index.php';
  }
}