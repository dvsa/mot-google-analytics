<?php

/**
 * This file is part of the DVSA MOT Google-Analytics project.
 */

use Dvsa\Mot\Frontend\GoogleAnalyticsModule\Factory\ControllerPlugin\DataLayerPluginFactory;

return [
    'controller_plugins' => [
        'factories' => [
            'gtmDataLayer' => DataLayerPluginFactory::class,
        ],
    ],
];
