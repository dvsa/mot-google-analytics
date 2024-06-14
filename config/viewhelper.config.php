<?php

/**
 * This file is part of the DVSA MOT Google-Analytics project.
 */

use Dvsa\Mot\Frontend\GoogleAnalyticsModule\Factory\ViewHelper\DataLayerViewHelperFactory;

return [
    'view_helpers' => [
        'factories' => [
            'gtmDataLayer' => DataLayerViewHelperFactory::class,
            Laminas\I18n\View\Helper\Translate::class => Laminas\ServiceManager\Factory\InvokableFactory::class,
        ],
        'aliases' => [
            'translate' => Laminas\I18n\View\Helper\Translate::class,
        ],
    ],
];
