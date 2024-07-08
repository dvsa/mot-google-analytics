<?php

/**
 * This file is part of the DVSA MOT Google Analytics project.
 */

namespace Dvsa\Mot\Frontend\GoogleAnalyticsModuleTest\Functional;

use Dvsa\Mot\Frontend\GoogleAnalyticsModuleTest\Functional\Controller\IndexController;
use Laminas\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class ApplicationTest extends AbstractHttpControllerTestCase
{
    /**
     * @var bool
     */
    protected $traceError = true;

    protected function setUp(): void
    {
        $this->setApplicationConfig(require __DIR__ . '/config/application.config.php');
        parent::setUp();
    }

    public function testIndexAction(): void
    {
        $this->dispatch('/');

        $this->assertModulesLoaded(['Dvsa\Mot\Frontend\GoogleAnalyticsModule']);
        $this->assertControllerName(IndexController::class);
        $this->assertMatchedRouteName('index');

        /** @var string */
        $content = $this->getResponse()->getContent();
        $this->assertStringStartsWith('<!doctype html>', $content);
        $this->assertStringContainsString('var dataLayer = [{', $content);
    }
}
