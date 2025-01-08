<?php
// filepath: /home/zerlix/www/html/Guestbook/src/lib/env_loader.php

function loadEnv($filePath) {
    if (!file_exists($filePath)) {
        throw new Exception('.env file not found');
    }

    $env = file_get_contents($filePath);
    $lines = explode("\n", $env);

    foreach ($lines as $line) {
        // Ignoriere leere Zeilen und Kommentare
        if (trim($line) === '' || strpos(trim($line), '#') === 0) {
            continue;
        }

        // Extrahiere den Schlüssel und den Wert
        preg_match("/([^#]+)\=(.*)/", $line, $matches);
        if (isset($matches[2])) {
            putenv(trim($line));
        }
    }
}