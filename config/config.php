<?php
// filepath: /home/zerlix/www/html/Guestbook/config/config.php

// Set DEBUG to true to enable error reporting
if (!defined('DEBUG')) {
  define('DEBUG', true);
}

// Error reporting
if (DEBUG) {
  // Enable error reporting and display errors
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  // Enable mysqli error reporting
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
} else {
  // Disable error reporting and hide errors
  ini_set('display_errors', 0);
  ini_set('display_startup_errors', 0);
  error_reporting(0);
}

// loadEnv function is defined in env_loader.php
require_once __DIR__ . '/../src/lib/env_loader.php';
loadEnv(__DIR__ . '/../.env');

// Get database credentials from environment variables
$host = getenv('DB_HOST');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_DATABASE');

// Create a new mysqli connection
$db = new mysqli($host, $username, $password, $database);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}