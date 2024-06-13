<?php

/**
 * This file is part of the DVSA MOT Google-Analytics project.
 */

namespace Dvsa\Mot\Frontend\GoogleAnalyticsModuletest\Unit\TagManager;

use Dvsa\Mot\Frontend\GoogleAnalyticsModule\TagManager\DataLayer;
use PHPUnit\Framework\TestCase;

class DataLayerTest extends TestCase
{
    /**
     * @return void
     */
    public function testAddEmpty()
    {
        $dataLayer = new DataLayer();
        $dataLayer->add([]);

        $this->assertEmpty($dataLayer->getAll());
    }

    /**
     * @return void
     */
    public function testAddSingleVariable()
    {
        $dataLayer = new DataLayer();
        $dataLayer->add(['event' => 'user-login-successful']);

        $this->assertEquals('user-login-successful', $dataLayer->getAll()['event']);
    }

    /**
     * @return void
     */
    public function testAddMultipleVariables()
    {
        $dataLayer = new DataLayer();
        $dataLayer->add([
            'userId' => '5a713869ade8c3665c7e88c01e81a3f220cfde7d',
            'event' => 'removed-defect',
            'journey' => 'RFRs',
            'title' => 'Test result entry - the defect has been removed',
        ]);

        $vars = $dataLayer->getAll();

        $this->assertEquals('5a713869ade8c3665c7e88c01e81a3f220cfde7d', $vars['userId']);
        $this->assertEquals('removed-defect', $vars['event']);
        $this->assertEquals('RFRs', $vars['journey']);
        $this->assertEquals('Test result entry - the defect has been removed', $vars['title']);
    }

    /**
     * @return void
     */
    public function testAddMultipleTimes()
    {
        $dataLayer = new DataLayer();
        $dataLayer->add([
            'first' => 'try',
        ]);

        $dataLayer->add([
            'second' => 'try',
        ]);

        $vars = $dataLayer->getAll();

        $this->assertEquals([
            'first' => 'try',
            'second' => 'try',
        ], $vars);
    }

    /**
     * @return void
     */
    public function testSort()
    {
        $dataLayer = new DataLayer();
        $dataLayer->add(['x' => 'X', 'a' => 'A', 'z' => 'Z', 'b' => 'B']);

        $vars = $dataLayer->sort()->getAll();
        foreach (['A', 'B', 'X', 'Z'] as $k) {
            $this->assertEquals($k, array_shift($vars));
        }
    }

    /**
     * @return void
     */
    public function testVariablesAreOverriddenOnAdd()
    {
        $dataLayer = new DataLayer();
        $dataLayer->add(['event' => 'user-login-fail']);
        $dataLayer->add(['event' => 'user-login-successful']);

        $this->assertEquals('user-login-successful', $dataLayer->getAll()['event']);
    }

    /**
     * @return void
     */
    public function testClear()
    {
        $dataLayer = new DataLayer();
        $dataLayer->add(['1' => 1, '2' => 2, '3' => 3, '4' => 4]);

        $this->assertCount(4, $dataLayer->getAll());

        $dataLayer->clear();
        $this->assertEmpty($dataLayer->getAll());
    }
}
