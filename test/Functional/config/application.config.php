<?php
/**
 * This file is part of the DVSA MOT Google Analytics project.
 */

return [
    'modules' => [
        'Dvsa\Mot\Frontend\GoogleAnalyticsModule',
        'Dvsa\Mot\Frontend\GoogleAnalyticsModuleTest\Functional',
	'Laminas\Router'
    ],
    'module_listener_options' => [
        'module_paths' => [
            __DIR__ . '/../../../src/',
            __DIR__ . '/../../../test/Functional',
        ],
    ],
];
