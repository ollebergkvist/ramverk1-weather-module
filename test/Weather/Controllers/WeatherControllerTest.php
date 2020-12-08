<?php

namespace Olbe19\Weather\Controllers;

use Anax\DI\DIMagic;
use Anax\Response\ResponseUtility;
use PHPUnit\Framework\TestCase;

/**
 * Weather controller test class.
 */
class WeatherControllerTest extends TestCase
{
    private $controller;

    /**
     * Setup test
     */
    protected function setUp() : void
    {
        global $di;

        // Setup di
        $di = new DIMagic();
        $di->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $di->loadServices(ANAX_INSTALL_PATH . "/test/config/di");

        // Use a different cache dir for unit test
        // $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        $this->di = $di;

        $this->controller = new WeatherController();
        $this->controller->setDI($this->di);
    }

    /**
     * Test indexActionGet
     */
    public function testIndexActionGet()
    {
        $request = $this->di->get("request");
        $request->setGet("ip", "216.58.217.36");

        $result = $this->controller->indexActionGet();

        $this->assertIsObject($result);
        $this->assertInstanceOf("Anax\Response\Response", $result);
    }
}
