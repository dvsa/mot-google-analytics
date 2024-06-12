<?php

/**
 * This file is part of the DVSA MOT Google Analytics project.
 */

namespace Dvsa\Mot\Frontend\GoogleAnalyticsModuletest\Unit\Factory\ControllerPlugin;

use Dvsa\Mot\Frontend\GoogleAnalyticsModule\ControllerPlugin\DataLayerPlugin;
use Dvsa\Mot\Frontend\GoogleAnalyticsModule\Factory\ControllerPlugin\DataLayerPluginFactory;
use Dvsa\Mot\Frontend\GoogleAnalyticsModule\TagManager\DataLayer;
use Interop\Container\ContainerInterface;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject as MockObj;

class DataLayerPluginFactoryTest extends TestCase
{
    public function testCreateService()
    {
        /** @var ContainerInterface|MockObj $container */
        $container = $this
            ->getMockBuilder(ContainerInterface::class)
            ->getMock();

        $container
            ->expects($this->any())
            ->method('get')
            ->willReturn(new DataLayer());

        $factory = new DataLayerPluginFactory();
        $dataLayerViewHelper = $factory($container, null, []);
        $this->assertInstanceOf(DataLayerPlugin::class, $dataLayerViewHelper);
    }
}
