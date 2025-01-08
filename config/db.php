<?php

// Database credentials
$host = 'localhost';
$username = 'udash';
$password = 'udash';
$database = 'udash';

// set DEBUG to true to enable error reporting
if (!defined('DEBUG'))
  define('DEBUG', false);

// Error reporting
if (defined('DEBUG') && DEBUG) {
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
}

// Connect to the database
try {
  $db = new mysqli($host, $username, $password, $database);
  $db->set_charset('utf8mb4');

  // Check connection
  if ($db->connect_error) {
    throw new Exception("Connection failed: " . $db->connect_error);
  }
  
} catch (Exception $e) {
  echo "An exception has been thrown: " . $e->getMessage();
  exit;
}

