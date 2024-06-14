<?php

/**
 * This file is part of the DVSA MOT Google Analytics project.
 */

namespace Dvsa\Mot\Frontend\GoogleAnalyticsModuletest\Functional;

use Dvsa\Mot\Frontend\GoogleAnalyticsModuletest\Functional\Controller\IndexController;
use Laminas\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class ApplicationTest extends AbstractHttpControllerTestCase
{
    protected $traceError = true;
    protected $application;
    protected $applicationConfig;
    protected $backupStaticAttributes;
    protected $runTestInSeparateProcess;


    protected function setUp(): void
    {
        $this->setApplicationConfig(require __DIR__ . '/config/application.config.php');
        parent::setUp();
    }

    /**
     * @throws \Exception
     */
    public function testIndexAction(): void
    {
        $this->dispatch('/');

        $this->assertModulesLoaded(['Dvsa\Mot\Frontend\GoogleAnalyticsModule']);
        $this->assertControllerName(IndexController::class);
        $this->assertMatchedRouteName('index');

        $content = $this->getResponse()->getContent();
        $this->assertStringStartsWith('<!doctype html>', $content);
        $this->assertStringContainsString('var dataLayer = [{', $content);
    }
}
