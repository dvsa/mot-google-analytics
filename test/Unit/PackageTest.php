<?php

/**
 * This file is part of the DVSA MOT Google-Analytics project.
 */

namespace Dvsa\Mot\Frontend\GoogleAnalyticsModuleTest\Unit;

use Dvsa\Mot\Frontend\GoogleAnalyticsModule\Package;
use PHPUnit\Framework\TestCase;

class PackageTest extends TestCase
{
    /**
     * @return void
     */
    public function testConstantsAreDefined()
    {
        $constants = ['VENDOR', 'NAME', 'FQPN', 'DESCRIPTION', 'VERSION'];
        foreach ($constants as $constant) {
            $this->assertTrue(defined(Package::class . '::' . $constant));
        }
    }
}
