<?php

// set DEBUG to true to enable error reporting
if (!defined('DEBUG'))
  define('DEBUG', true);

// Error reporting
if (defined('DEBUG') && DEBUG) {
  // Enable error reporting and display errors
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
}

$basePath = '/home/zerlix/www/html/Guestbook';

// Database credentials
$host = 'localhost';
$username = 'guestbook';
$password = 'demo1234';
$database = 'guestbook';


// Enable mysqli error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

  
// Connect to the database and Check configuration
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

