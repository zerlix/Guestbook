<?php
const DEBUG = true;

require_once '../config/db.php';
require_once '../controller/GuestbookController.php';

// Erstelle eine Instanz des GuestbookControllers und übergebe die Datenbankverbindung
$controller = new GuestbookController($db);

// Rufe die index-Methode des Controllers auf, um die Gästebucheinträge anzuzeigen
$controller->index();

