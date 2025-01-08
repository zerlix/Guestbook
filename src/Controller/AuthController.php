<?php
namespace Curiosum\Controller;

require_once '../config/config.php';

class AuthController {
  
  private $db;

  public function __construct($db) {
    $this->db = $db;
  }

  public function login() {
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
      $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

      if ($username && $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
          $_SESSION['admin'] = $user['id'];
          header('Location: admin.php');
          exit;
        } else {
          $_SESSION['error'] = "Ungültiger Benutzername oder Passwort.";
        }
      } else {
        $_SESSION['error'] = "Bitte füllen Sie alle Felder aus.";
      }
    }

    require '../views/auth/login.php';
  }

  public function logout() {
    session_start();
    session_destroy();
    header('Location: login.php');
    exit;
  }
}