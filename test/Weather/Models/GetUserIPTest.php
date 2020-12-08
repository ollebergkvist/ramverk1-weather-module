<?php

namespace Olbe19\Weather\Models;

use Anax\Response\ResponseUtility;
use PHPUnit\Framework\TestCase;

/**
 * Test the IPController.
 */
class GetUserIPTest extends TestCase
{
    // Create the di container.
    protected $userIP;

    /**
     * Prepare before each test.
     */
    protected function setUp()
    {
        $this->userIP = new GetUserIP();
    }

    /**
     * Test route indexActionGet
     */
    public function testHTTPCLIENTIP()
    {
        $expectedIP = "187.178.82.197";
        $_SERVER["HTTP_CLIENT_IP"] = "187.178.82.197";

        $actualIP = $this->userIP->getIP();

        $this->assertEquals($expectedIP, $actualIP);
    }

    /**
     * Test route indexActionGet
     */
    public function testHTTPXFORWARDEDFOR()
    {
        $expectedIP = "187.178.82.197";
        $_SERVER["HTTP_X_FORWARDED_FOR"] = "187.178.82.197";

        $actualIP = $this->userIP->getIP();

        $this->assertEquals($expectedIP, $actualIP);
    }

    /**
     * Test route indexActionGet
     */
    public function testHTTPXFORWARDED()
    {
        $expectedIP = "187.178.82.197";
        $_SERVER["HTTP_X_FORWARDED"] = "187.178.82.197";

        $actualIP = $this->userIP->getIP();

        $this->assertEquals($expectedIP, $actualIP);
    }

    /**
     * Test route indexActionGet
     */
    public function testREMOTEADDR()
    {
        $expectedIP = "187.178.82.197";
        $_SERVER["REMOTE_ADDR"] = "187.178.82.197";

        $actualIP = $this->userIP->getIP();

        $this->assertEquals($expectedIP, $actualIP);
    }

    /**
     * Test route indexActionGet
     */
    public function testUNKNOWN()
    {
        $expectedIP = "unknown";

        $actualIP = $this->userIP->getIP();

        $this->assertEquals($expectedIP, $actualIP);
    }
}
