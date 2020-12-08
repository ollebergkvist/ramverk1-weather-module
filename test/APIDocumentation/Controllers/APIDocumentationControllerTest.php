<?php

namespace Olbe19\APIDocumentation;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class APIDocumentationControllerTest extends TestCase
{
    // Create the di container.
    protected $di;
    protected $controller;

    /**
     * Prepare before each test.
     */
    protected function setUp()
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $this->di->loadServices(ANAX_INSTALL_PATH . "/test/config/di");

        // Use a different cache dir for unit test
        // $this->di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        // Setup the controller
        $this->controller = new APIDocumentationController();
        $this->controller->setDI($this->di);
    }

    /**
     * Test route indexActionGet
     */
    public function testIndexActionGet()
    {
        $result = $this->controller->indexActionGet();
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $result);
        $this->assertIsObject($result);
    }
}
