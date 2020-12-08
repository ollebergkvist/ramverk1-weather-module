<?php

namespace Olbe19\Weather\Models;

use PHPUnit\Framework\TestCase;

/**
 * Tests for the IP Validator class
 */
class IPValidatorTest extends TestCase
{
    private $validator;

    /**
     * Create validator before each test
     */
    protected function setUp() : void
    {
        $this->validator = new IPValidator();
    }

    /**
     * Test that valid IP returns true
     */
    public function testIsIPValidTrue()
    {
        $ipAddress = "216.58.217.36";
        $result = $this->validator->isIPValid($ipAddress);

        $this->assertTrue($result);
    }

    /**
     * Test that invalid IP returns false
     */
    public function testIsIPValidFalse()
    {
        $ipAddress = "216.58.";
        $result = $this->validator->isIPValid($ipAddress);

        $this->assertFalse($result);
    }

    /**
     * Test that IPv4 address returns correct protocol
     */
    public function testGetIPProtocolIPv4()
    {
        $ipAddress = "216.58.217.36";
        $expected = "IPv4";
        $result = $this->validator->getIPProtocol($ipAddress);

        $this->assertEquals($result, $expected);
    }

    /**
     * Test that IPv6 address returns correct protocol
     */
    public function testGetIPProtocolIPv6()
    {
        $ipAddress = "2001:0db8:85a3:0000:0000:8a2e:0370:7334";
        $expected = "IPv6";
        $result = $this->validator->getIPProtocol($ipAddress);

        $this->assertEquals($result, $expected);
    }

    /**
     * Test that invalid IP returns empty as protocol
     */
    public function testGetIPProtocolInvalid()
    {
        $ipAddress = "216.58.";
        $expected = "";
        $result = $this->validator->getIPProtocol($ipAddress);

        $this->assertEquals($result, $expected);
    }

    /**
     * Test that valid IP returns host
     */
    public function testGetIPHostValid()
    {
        $ipAddress = "13.226.234.53";
        $expected = "server-13-226-234-53.lax50.r.cloudfront.net";
        $result = $this->validator->getIPHost($ipAddress);

        $this->assertEquals($result, $expected);
    }

    /**
     * Test that valid IP returns host
     */
    public function testGetIPHostInvalid()
    {
        $ipAddress = "216.58";
        $expected = "";
        $result = $this->validator->getIPHost($ipAddress);

        $this->assertEquals($result, $expected);
    }
}
