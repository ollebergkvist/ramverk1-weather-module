<?php

/**
 * IP model
 */

namespace Olbe19\Weather\Models;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * Get IP of current user
 *
 */
class GetUserIP implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    /**
     * Returns user IP address
     *
     * @return string $ipAddress User IP address
     */

    // public function getIP()
    // {
    //     $request = $this->di->get("request");
    //     $httpClientIP = $request->getServer('HTTP_CLIENT_IP');
    //     $httpXForwardedFor = $request->getServer('HTTP_X_FORWARDED_FOR');
    //     $httpXForwarded = $request->getServer('HTTP_X_FORWARDED');
    //     $remoteADDR = $request->getServer('REMOTE_ADDR');

    //     if (isset($httpClientIP)) {
    //         $ipAddress = $httpClientIP;
    //     } elseif (isset($httpXForwardedFor)) {
    //         $ipAddress = $httpXForwardedFor;
    //     } elseif (isset($httpXForwarded)) {
    //         $ipAddress = $httpXForwarded;
    //     } elseif (isset($remoteADDR)) {
    //         $ipAddress = $remoteADDR;
    //     } $ipAddress = 'unknown';
    //     return $ipAddress;
    // }

    public function getIP()
    {
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
            $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
        } else if (isset($_SERVER['REMOTE_ADDR'])) {
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        } else {
            $ipAddress = 'unknown';
        }
        return $ipAddress;
    }
}
