<?php

/**
 * This file is part of the DVSA MOT Google-Analytics project.
 */

namespace Dvsa\Mot\Frontend\GoogleAnalyticsModule\Factory\ViewHelper;

use Dvsa\Mot\Frontend\GoogleAnalyticsModule\TagManager\DataLayer;
use Dvsa\Mot\Frontend\GoogleAnalyticsModule\ViewHelper\DataLayerViewHelper;
use Interop\Container\ContainerInterface;
use Laminas\Mvc\Controller\Plugin\AbstractPlugin;
use Laminas\ServiceManager\Factory\FactoryInterface;

/**
 * Factory for creating DataLayerViewHelper.
 */
class DataLayerViewHelperFactory extends AbstractPlugin implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string|null $requestedName
     * @param array|null $options
     * @return DataLayerViewHelper
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): DataLayerViewHelper
    {
        /** @var DataLayer */
        $dataLayer = $container->get(DataLayer::class);
        return new DataLayerViewHelper($dataLayer);
    }
}
