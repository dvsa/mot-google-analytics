<?php

/**
 * This file is part of the DVSA MOT Google Analytics project.
 */

namespace Dvsa\Mot\Frontend\GoogleAnalyticsModuletest\Functional;

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
        return require __DIR__ . '/config/module.config.php';
    }
}
