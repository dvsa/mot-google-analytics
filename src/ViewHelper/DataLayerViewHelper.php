<?php

/**
 * This file is part of the DVSA MOT Google-Analytics project.
 */

namespace Dvsa\Mot\Frontend\GoogleAnalyticsModule\ViewHelper;

use Dvsa\Mot\Frontend\GoogleAnalyticsModule\TagManager\DataLayer;
use Error;
use Laminas\View\Helper\AbstractHelper;

class DataLayerViewHelper extends AbstractHelper
{
    /**
     * @var DataLayer
     */
    private $dataLayer;

    /**
     * DataLayerViewHelper constructor.
     *
     * @param DataLayer $dataLayer
     */
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
        if (empty($variables)) {
            return $this;
        }

        $this->dataLayer->add($variables, $scope);

        return $this;
    }

    /**
     * @param string $scope
     * @return string
     */
    public function render(string $scope = DataLayer::DATA_LAYER_SCOPE_DEFAULT): string
    {
        return 'var dataLayer = [' . $this->renderJson($scope) . '];';
    }

    /**
     * Used when we only need pure json, e.g. sending push events from JavaScript
     * @param string $scope
     *
     * @return string
     */
    public function renderJson(string $scope = DataLayer::DATA_LAYER_SCOPE_DEFAULT): string
    {
        $data = $this->dataLayer->getAll($scope);

        if (empty($data)) {
            return '';
        }

        $encodedData = json_encode($data, JSON_PRETTY_PRINT);

        if ($encodedData !== false) {
            return $encodedData;
        }

        throw new Error("Failed to encode data");
    }
}
