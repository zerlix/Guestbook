<?php
namespace Curiosum\Controller;

use Curiosum\Model\GuestbookModel;


class GuestbookController {
  
  private $model;

  public function __construct($db) {
    $this->model = new GuestbookModel($db);
  }

  public function index() {

    $entriesPerPage = 5; // Anzahl der Einträge pro Seite
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($currentPage - 1) * $entriesPerPage;
    
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

    $totalEntries = $this->model->getTotalEntries();
    $entries = $this->model->getMessages($offset, $entriesPerPage);
    $totalPages = ceil($totalEntries / $entriesPerPage);
    
    require __DIR__ . '/../View/Guestbook/index.php';
  }
}