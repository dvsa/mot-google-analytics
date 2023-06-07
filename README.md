# mot-google-analytics

A Laminas module for easy integration of Google Analytics and Google Tag Manager.

## Google Tag Manager and Data Layer

> **Google Tag Manager** is a tag management system created by Google to manage JavaScript and HTML tags used for tracking
 and analytics on websites (variants of e-marketing tags, sometimes referred to as tracking pixels or web beacons).

 _-- from [https://en.wikipedia.org/wiki/Google_Tag_Manager](https://en.wikipedia.org/wiki/Google_Tag_Manager)_

> A **data layer** is an object that contains all of the information that you want to pass to Google Tag Manager.
 Information such as events or variables can be passed to Google Tag Manager via the data layer, and triggers can be
  set up in Google Tag Manager based on the values of variables (e.g., fire a remarketing tag when
  `purchase_total > $100`) or based on the specific events. Variable values can also be passed through to other tags
   (e.g., pass `purchase_total` into the value field of a tag).

_-- from [https://developers.google.com/tag-manager/devguide](https://developers.google.com/tag-manager/devguide)_

To set up a data layer, a snippet of code like the following must be added to the head of the page (or elsewhere above
 the container snippet):

    <script>
      dataLayer = [];
    </script>


The above snippet is an empty object that can be populated with information to pass to Google Tag Manager. You can see
how to add properties to the Data Layer object in the _Usage_ section.

    <script>
      dataLayer = [{
        'userId': '5a713869ade8c3665c7e88c01e81a3f220cfde7d',
        'event': 'removed-defect',
        'journey': 'RFRs',
        'title': 'Test result entry - the defect has been removed'
    }];
    </script>


## Requirements

- [PHP 8](https://secure.php.net/downloads.php)
- [Composer](https://getcomposer.org/)

## Installation

Install the package via Composer:

```bash
$ composer require dvsa/mot-google-analytics
```

Then enable the `GoogleAnalyticsModule` module by adding it to `application.config.php`.

```php
<?php

'modules' => [
    'Dvsa\Mot\Frontend\GoogleAnalyticsModule',
],
```

## Usage

### In a Controller

```php
<?php

namespace MyModule\Controller;

use Dvsa\Mot\Frontend\GoogleAnalyticsModule\Package;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $view = new ViewModel([]);
        $view->setTemplate('my-module/index');

        $this->gtmDataLayer([
          'event'   => 'removed-defect',
          'journey' => 'RFRs',
          'title'   => 'Test result entry - the defect has been removed',
        ]);

        return $view;
    }
}
```

### In a View

```html
<html>
  <head>
    <script type="text/javascript"><?php
       // Add variables and render the script all at once.
      echo $this->gtmDataLayer(['userId' => '5a713869ade8c366'])->render();
    ?></script>
  </head>
  <body></body>
</html>
```

or


```
<?php
// Append variables
$this->gtmDataLayer(['userId' => '5a713869ade8c366']);
?>
<html>
  <head>
    <script type="text/javascript"><?php
      // and now render the script.
      echo $this->gtmDataLayer()->render();
    ?></script>
  </head>
  <body></body>
</html>
```

### In a Service

```php
<?php

namespace MyModule\Service;

use Dvsa\Mot\Frontend\GoogleAnalyticsModule\TagManager\DataLayer;

class MyService
{
    /**
     * @var DataLayer
     */
    private $dataLayer;

    /**
     * To inject the $dataLayer object retrieve the `DataLayer::class` service from the main service container.
     *
     * @param $dataLayer DataLayer
     */
    public function __construct(DataLayer $dataLayer)
    {
        $this->dataLayer = $dataLayer;
        $this->dataLayer->add([
          'event'   => 'removed-defect',
          'journey' => 'RFRs',
          'title'   => 'Test result entry - the defect has been removed',
        ]);
    }
}

```

## Development and executing Tests

Download the repo and install all dependencies:

    $ git clone git@gitlab.motdev.org.uk:mot/mot-google-analytics.git
    $ composer install

To execute unit and functional tests please do:

    $ composer test

To generate code coverage:

    $ composer test-coverage

HTML files will be saved to `build/code-coverage/html/` and Clover XML to `build/code-coverage/clover/`

If you want to launch the application for debug purposes execute `test/bin/start-app.sh`. The application will be
 available at `http://127.0.0.1:8080/`.

## Contributing

Please refer to our [Contribution Guide](/CONTRIBUTING.md).
