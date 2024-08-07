<?php

/**
 * This file is part of the DVSA MOT Google Analytics project.
 */

namespace Dvsa\Mot\Frontend\GoogleAnalyticsModuleTest\Functional;

use Laminas\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    /**
     * Returns configuration to merge with application configuration.
     *
     * @return ((((string|string[])[]|string|true)[]|string)[]|string|true)[][]
     */
    public function getConfig()
    {
        return require __DIR__ . '/config/module.config.php';
    }
}
