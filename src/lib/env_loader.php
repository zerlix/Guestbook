<?php
/**
 * Loads environment variables from a .env file into the PHP environment.
 *
 * @param string $filePath The path to the .env file.
 * @throws Exception If the .env file does not exist.
 */

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