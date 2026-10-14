<?php

return [
    'modules' => [
        'DvsaLogger',
        'Dvsa\Mot\Frontend\GoogleAnalyticsModule',
        'Laminas\Router',
        'Laminas\I18n',
    ],
    'module_listener_options' => [
        'config_glob_paths' => [
            __DIR__ . '/autoload/{,*.}{global,local}.php',
        ],
    ],
];
