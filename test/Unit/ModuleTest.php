<?php

/**
 * This file is part of the DVSA MOT Google-Analytics project.
 */

namespace Dvsa\Mot\Frontend\GoogleAnalyticsModuleTest\Unit;

use Dvsa\Mot\Frontend\GoogleAnalyticsModule\Module;
use PHPUnit\Framework\TestCase;

class ModuleTest extends TestCase
{
    /**
     * @return void
     */
    public function testGetConfig()
    {
        $module = new Module();
        $config = $module->getConfig();
        // $this->assertIsArray($config);
        $this->assertSame($config, unserialize(serialize($config)));
    }
}
