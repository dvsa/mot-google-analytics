<?php

/**
 * This file is part of the DVSA MOT Google-Analytics project.
 */

ini_set('error_reporting', E_ALL);

$files = [__DIR__ . '/../vendor/autoload.php', __DIR__ . '/../../../autoload.php'];

$loader = null;
foreach ($files as $file) {
    if (!file_exists($file)) {
        continue;
    }

    $loader = require $file;
}
if (!$loader) {
    throw new RuntimeException('vendor/autoload.php could not be found. Did you run `php composer.phar install`?');
}
