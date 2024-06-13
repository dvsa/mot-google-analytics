<?php

/**
 * This file is part of the DVSA MOT Google-Analytics project.
 */

namespace Dvsa\Mot\Frontend\GoogleAnalyticsModule\Factory\ControllerPlugin;

use Dvsa\Mot\Frontend\GoogleAnalyticsModule\ControllerPlugin\DataLayerPlugin;
use Dvsa\Mot\Frontend\GoogleAnalyticsModule\TagManager\DataLayer;
use Interop\Container\ContainerInterface;
use Laminas\Mvc\Controller\Plugin\AbstractPlugin;
use Laminas\ServiceManager\Factory\FactoryInterface;

class DataLayerPluginFactory extends AbstractPlugin implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string | null $requestedName
     * @param array|null $options
     * @return DataLayerPlugin
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): DataLayerPlugin
    {
        /** @var DataLayer */
        $dataLayer = $container->get(DataLayer::class);
        return new DataLayerPlugin($dataLayer);
    }
}
