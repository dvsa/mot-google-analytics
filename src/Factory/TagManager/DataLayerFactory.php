<?php

/**
 * This file is part of the DVSA MOT Google-Analytics project.
 */

namespace Dvsa\Mot\Frontend\GoogleAnalyticsModule\Factory\TagManager;

use Dvsa\Mot\Frontend\GoogleAnalyticsModule\TagManager\DataLayer;
use Interop\Container\ContainerInterface;
use Laminas\Mvc\Controller\Plugin\AbstractPlugin;
use Laminas\ServiceManager\Factory\FactoryInterface;

class DataLayerFactory extends AbstractPlugin implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return DataLayer|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): DataLayer
    {
            return new DataLayer();
    }
}
