<?php
require_once '../config/config.php';
require_once '../autoloader.php';
use Curiosum\Controller\GuestbookController;
use Curiosum\Controller\AuthController;


// simple router
$requestUri = $_SERVER['REQUEST_URI'];
$route = str_replace(__DIR__ , '', $requestUri);

if (strpos($route, 'login') !== false) {
    // AuthController for login page
    $authController = new AuthController($db);
    $authController->login();
} else {
    // GuestbookController for guestbook page
    $controller = new GuestbookController($db);
    $controller->index();
}

