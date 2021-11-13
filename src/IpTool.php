<?php

namespace Cz88\IpSDK;

class IpTool
{
    /**
     * 检查此IP是否为合法的IPv4地址
     * @param $ip
     * @return bool
     */
    public static function isValidIPv4($ip)
    {
        return $ip === filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    }
}