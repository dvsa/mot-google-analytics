<?php

/**
 * This file is part of the DVSA MOT Google Analytics project.
 */

chdir(dirname(__DIR__));
// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server') {
    $path = realpath(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    if (__FILE__ !== $path && is_file($path)) {
        return false;
    }
    unset($path);
}

require __DIR__ . '/../../../vendor/autoload.php';

Laminas\Mvc\Application::init(require __DIR__ . '/../config/application.config.php')->run();
