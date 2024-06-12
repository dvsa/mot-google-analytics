<?php

/**
 * This file is part of the DVSA MOT Google-Analytics project.
 */

namespace Dvsa\Mot\Frontend\GoogleAnalyticsModule\ControllerPlugin;

use Dvsa\Mot\Frontend\GoogleAnalyticsModule\TagManager\DataLayer;
use Laminas\Mvc\Controller\Plugin\AbstractPlugin;

class DataLayerPlugin extends AbstractPlugin
{
    /**
     * @var DataLayer
     */
    private $dataLayer;

    public function __construct(DataLayer $dataLayer)
    {
        $this->dataLayer = $dataLayer;
    }

    /**
     * @param array $variables
     *
     * @param string $scope
     * @return $this
     */
    public function __invoke(array $variables = [], string $scope = DataLayer::DATA_LAYER_SCOPE_DEFAULT)
    {
        $this->dataLayer->add($variables, $scope);

        return $this;
    }
}
