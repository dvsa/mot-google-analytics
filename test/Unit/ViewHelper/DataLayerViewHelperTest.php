<?php

/**
 * This file is part of the DVSA MOT Google-Analytics project.
 */

namespace Dvsa\Mot\Frontend\GoogleAnalyticsModuleTest\Unit\ViewHelper;

use Dvsa\Mot\Frontend\GoogleAnalyticsModule\TagManager\DataLayer;
use Dvsa\Mot\Frontend\GoogleAnalyticsModule\ViewHelper\DataLayerViewHelper;
use PHPUnit\Framework\TestCase;

class DataLayerViewHelperTest extends TestCase
{
    private const SIMPLE_TEST_JSON = <<<'EOD'
{
    "simple": "test"
}
EOD;

    private const SIMPLE_TEST_JS = <<<'EOD'
var dataLayer = [{
    "simple": "test"
}];
EOD;

    private const SIMPLE_TEST_ARRAY = [
        'simple' => 'test'
    ];

    private const CUSTOM_SCOPE = 'custom_scope';

    public function testInvoke(): void
    {
        $dataLayer = new DataLayer();
        $dataLayerViewHelper = new DataLayerViewHelper($dataLayer);

        $this->assertEquals($dataLayerViewHelper, $dataLayerViewHelper());
    }

    public function testRenderWithoutData(): void
    {
        $js = <<<'EOD'
var dataLayer = [];
EOD;

        $viewHelper = $this->createViewHelper([]);

        $this->assertEquals($js, $viewHelper->render());
    }

    public function testRenderWithData(): void
    {
        $js = <<<'EOD'
var dataLayer = [{
    "event": "user-login-fail",
    "journey": "sign-in",
    "title": "Sign in - your sign in attempt has failed"
}];
EOD;

        $viewHelper = $this->createViewHelper(
            [
            'event'   => 'user-login-fail',
            'journey' => 'sign-in',
            'title'   => 'Sign in - your sign in attempt has failed',
            ],
            DataLayer::DATA_LAYER_SCOPE_DEFAULT
        );

        $this->assertEquals($js, $viewHelper->render());
    }

    public function testRenderForCustomScope(): void
    {
        $viewHelper = $this->createViewHelper(self::SIMPLE_TEST_ARRAY, self::CUSTOM_SCOPE);

        $this->assertEquals(self::SIMPLE_TEST_JS, $viewHelper->render(self::CUSTOM_SCOPE));
    }

    public function testRenderJson(): void
    {
        $viewHelper = $this->createViewHelper(self::SIMPLE_TEST_ARRAY, DataLayer::DATA_LAYER_SCOPE_DEFAULT);

        $this->assertEquals(self::SIMPLE_TEST_JSON, $viewHelper->renderJson());
    }

    public function testRenderJsonForCustomScope(): void
    {
        $viewHelper = $this->createViewHelper(self::SIMPLE_TEST_ARRAY, self::CUSTOM_SCOPE);

        $this->assertEquals(self::SIMPLE_TEST_JSON, $viewHelper->renderJson(self::CUSTOM_SCOPE));
    }

    private function createViewHelper(array $dataVars, string $scope = DataLayer::DATA_LAYER_SCOPE_DEFAULT): DataLayerViewHelper
    {
        $dataLayer = new DataLayer();
        $dataLayer->add($dataVars, $scope);
        $dataLayerViewHelper = new DataLayerViewHelper($dataLayer);

        return $dataLayerViewHelper;
    }
}
