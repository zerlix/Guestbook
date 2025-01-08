<?php

require_once '../config/db.php';
require_once '../models/guestbook.php';



class GuestbookController {
  
  private $model;

  public function __construct($db) {
    $this->model = new GuestbookMessages($db);
  }

  public function index() {
    $entries = $this->model->getMessages();
    require '../views/guestbook/index.php';
  }
}