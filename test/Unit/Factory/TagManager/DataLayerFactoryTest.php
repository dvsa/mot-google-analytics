<?php

/**
 * This file is part of the DVSA MOT Google Analytics project.
 */

namespace Dvsa\Mot\Frontend\GoogleAnalyticsModuletest\Unit\Factory\TagManager;

use Dvsa\Mot\Frontend\GoogleAnalyticsModule\TagManager\DataLayer;
use Dvsa\Mot\Frontend\GoogleAnalyticsModule\Factory\TagManager\DataLayerFactory;
use Interop\Container\ContainerInterface;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject as MockObj;

class DataLayerFactoryTest extends TestCase
{
    public function testCreateService()
    {
        /** @var ContainerInterface|MockObj $continaer */
        $continaer = $this
            ->getMockBuilder(ContainerInterface::class)
            ->getMock();

        $dataLayerFactory = new DataLayerFactory();
        $dataLayerViewHelper = $dataLayerFactory($continaer, null, []);
        $this->assertInstanceOf(DataLayer::class, $dataLayerViewHelper);
    }
}
