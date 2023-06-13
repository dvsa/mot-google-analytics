<?php
/**
 * This file is part of the DVSA MOT Google-Analytics project.
 */

namespace Dvsa\Mot\Frontend\GoogleAnalyticsModule\TagManager;

use Laminas\Mvc\Controller\Plugin\AbstractPlugin;

/**
 * A data layer is a data structure used by Google Tag Manager for storing, processing, and passing data between the
 * digital context and the tag management solution.
 *
 * @see https://developers.google.com/tag-manager/devguide#datalayer for details.
 */
class DataLayer extends AbstractPlugin
{
    const DATA_LAYER_SCOPE_DEFAULT = "default";

    /**
     * Data layer variables.
     *
     * @var array
     */
    private $variables = [self::DATA_LAYER_SCOPE_DEFAULT => [],];

    /**
     * Adds multiple variables to the dataLayer. If the key already exists then the previous entry will be replaced.
     *
     * @param array $variables
     *
     * @param string $scope
     * @return $this
     */
    public function add(array $variables, string $scope = self::DATA_LAYER_SCOPE_DEFAULT): DataLayer
    {
        if (!array_key_exists($scope, $this->variables)) {
            $this->variables[$scope] = [];
        }
        if (count($variables) === 1) {
            $key = key($variables);
            $this->variables[$scope][$key] = $variables[$key];
        } elseif (count($variables) > 1) {
            $this->variables[$scope] = $this->variables[$scope] + $variables;
        }
        return $this;
    }

    /**
     * @param string $scope
     * @return array
     */
    public function getAll(string $scope = self::DATA_LAYER_SCOPE_DEFAULT): array
    {
        return $this->variables[$scope];
    }

    /**
     * @param string $scope
     * @return $this
     */
    public function sort(string $scope = self::DATA_LAYER_SCOPE_DEFAULT): DataLayer
    {
        ksort($this->variables[$scope], SORT_NATURAL);

        return $this;
    }

    /**
     * @param string $scope
     * @return $this
     */
    public function clear(string $scope = self::DATA_LAYER_SCOPE_DEFAULT): DataLayer
    {
        $this->variables[$scope] = [];

        return $this;
    }

    /**
     * @param array $variables
     *
     * @param string $scope
     * @return $this
     */
    public function __invoke(array $variables = [], string $scope = DataLayer::DATA_LAYER_SCOPE_DEFAULT): DataLayer
    {
        $this->add($variables, $scope);

        return $this;
    }
}
