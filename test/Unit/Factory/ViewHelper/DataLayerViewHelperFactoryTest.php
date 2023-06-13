<?php
/**
 * This file is part of the DVSA MOT Google Analytics project.
 */

namespace Dvsa\Mot\Frontend\GoogleAnalyticsModuletest\Unit\Factory\ViewHelper;

use Dvsa\Mot\Frontend\GoogleAnalyticsModule\TagManager\DataLayer;
use Dvsa\Mot\Frontend\GoogleAnalyticsModule\ViewHelper\DataLayerViewHelper;
use Dvsa\Mot\Frontend\GoogleAnalyticsModule\Factory\ViewHelper\DataLayerViewHelperFactory;
use Interop\Container\ContainerInterface;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject as MockObj;

class DataLayerViewHelperFactoryTest extends TestCase
{
    public function testCreateService()
    {
        /** @var ContainerInterface|MockObj $continerInterface */
        $continerInterface = $this
            ->getMockBuilder(ContainerInterface::class)
            ->getMock();
        $continerInterface
            ->expects($this->any())
            ->method('get')
            ->willReturn(new DataLayer());

        $dataLayerViewHelperFactory = new DataLayerViewHelperFactory();
        $dataLayerViewHelper = $dataLayerViewHelperFactory($continerInterface, null, null);
        $this->assertInstanceOf(DataLayerViewHelper::class, $dataLayerViewHelper);
    }
}
