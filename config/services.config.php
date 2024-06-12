<?php

/**
 * This file is part of the DVSA MOT Google-Analytics project.
 */

use Dvsa\Mot\Frontend\GoogleAnalyticsModule\Factory\TagManager\DataLayerFactory;
use Dvsa\Mot\Frontend\GoogleAnalyticsModule\TagManager\DataLayer;

return [
    'service_manager' => [
        'factories' => [
            DataLayer::class => DataLayerFactory::class,
        ],
    ],
];
