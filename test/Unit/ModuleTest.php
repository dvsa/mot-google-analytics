<?php

/**
 * This file is part of the DVSA MOT Google-Analytics project.
 */

namespace Dvsa\Mot\Frontend\GoogleAnalyticsModuleTest\Unit;

use Dvsa\Mot\Frontend\GoogleAnalyticsModule\Module;
use PHPUnit\Framework\TestCase;

class ModuleTest extends TestCase
{
    public function testGetConfig(): void
    {
        $module = new Module();
        $config = $module->getConfig();
        $this->assertSame($config, unserialize(serialize($config)));
    }
}
