<?php

/**
 * This file is part of the DVSA MOT Google-Analytics project.
 */

namespace Dvsa\Mot\Frontend\GoogleAnalyticsModule;

use Laminas\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    /**
     * Returns configuration to merge with application configuration.
     *
     * @return array|\Traversable
     */
    public function getConfig()
    {
        $moduleConfig = require __DIR__ . '/../config/module.config.php';
        $serviceConfig = require __DIR__ . '/../config/services.config.php';
        $viewHelperConfig = require __DIR__ . '/../config/viewhelper.config.php';

        return array_merge($moduleConfig, $serviceConfig, $viewHelperConfig);
    }
}
