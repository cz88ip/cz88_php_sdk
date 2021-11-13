<?php
namespace Cz88\IpSDK;

use Cz88\IpSDK\Exception\InvalidIpAddressException;
use Cz88\IpSDK\Exception\RequestException;

class CzClient
{
    protected $appCode = '';
    protected $ch = null;
    protected $timeout = 10;

    const URL = 'http://cz88.rtbasia.com/search';
    const VERSION = '1.0.0';

    /**
     * 修改请求超时时间，单位：秒
     * @param $timeout
     */
    public function setTimeout($timeout)
    {
        $this->timeout = max(1, (int)$timeout);
    }

    /**
     * 获得当前appCode
     * @return string
     */
    public function getAppCode()
    {
        return $this->appCode;
    }

    public function __construct($appCode)
    {
        $this->appCode = $appCode;
        $this->ch = curl_init();
        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $this->headers());
        curl_setopt($this->ch, CURLOPT_HEADER, 0);
        curl_setopt($this->ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, false);
    }

    protected function buildUrl($ip)
    {
        return static::URL . '?' . http_build_query(['ip' => $ip]);
    }

    protected function headers()
    {
        return ['Authorization:APPCODE ' . $this->appCode, 'User-Agent:CZ88/PHPSDK,V' . static::VERSION];
    }

    public function query($ip = '114.114.114.114')
    {
        if (!IpTool::isValidIPv4($ip)) {
            throw new InvalidIpAddressException("非法的IPv4地址：{$ip}");
        }
        curl_setopt($this->ch, CURLOPT_URL, $this->buildUrl($ip));
        $body = curl_exec($this->ch);
        if (false === $body) {
            throw new RequestException("接口请求失败，错误：" . curl_error($this->ch));
        }
        return json_decode($body, true);
    }

    public function __destruct()
    {
        if (is_resource($this->ch)) {
            curl_close($this->ch);
        }
    }
}