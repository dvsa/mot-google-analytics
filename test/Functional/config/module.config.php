<?php

/**
 * This file is part of the DVSA MOT Google Analytics project.
 */

use Dvsa\Mot\Frontend\GoogleAnalyticsModule\Package;
use Dvsa\Mot\Frontend\GoogleAnalyticsModuleTest\Functional\Controller\IndexController;

return [
    'controllers' => [
        'invokables' => [
            IndexController::class => IndexController::class,
        ],
    ],
        'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../views/layout.phtml',
            Package::FQPN . '/test/index' => __DIR__ . '/../views/index.phtml',
            'error/404' => __DIR__ . '/../views/error/404.phtml',
            'error/index' => __DIR__ . '/../views/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../views',
        ],
    ],
    'router' => [
        'routes' => [
            'index' => [
                'type' => 'literal',
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => IndexController::class,
                        'action' => 'index',
                    ],
                ],
                'may_terminate' => true,
            ],
        ],
    ],
];
