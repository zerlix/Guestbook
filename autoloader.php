<?php
spl_autoload_register(function($class) {
    if (!preg_match('/^' . preg_quote('Curiosum') . '/', $class)) {
        return;
    }
    
    $relativeClass = substr($class, strlen('Curiosum'));
    $file = __DIR__ . '/src' . str_replace('\\', DIRECTORY_SEPARATOR, $relativeClass) . '.php';

    if (file_exists($file)) {
        require_once($file);
    }
});