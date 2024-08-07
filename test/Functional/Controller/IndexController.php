<?php

/**
 * This file is part of the DVSA MOT Google Analytics project.
 */

namespace Dvsa\Mot\Frontend\GoogleAnalyticsModuleTest\Functional\Controller;

use Dvsa\Mot\Frontend\GoogleAnalyticsModule\Package;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction(): ViewModel
    {
        $view = new ViewModel([]);
        $view->setTemplate(Package::FQPN . '/test/index');

        /** @var callable */
        $gtmDataLayer = $this->plugin('gtmDataLayer');

        $gtmDataLayer(['controller' => __CLASS__]);

        return $view;
    }
}
