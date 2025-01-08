<?php
require_once '../config/config.php';
require_once '../controller/GuestbookController.php';
require_once '../controller/AuthController.php';



// Einfache Routing-Logik
$requestUri = $_SERVER['REQUEST_URI'];
$route = str_replace($basePath, '', $requestUri);

if (strpos($route, 'login') !== false) {
    // AuthController für Login
    $authController = new AuthController($db);
    $authController->login();
} else {
    // GuestbookController für Standardseiten
    $controller = new GuestbookController($db);
    $controller->index();
}

