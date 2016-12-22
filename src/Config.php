<?php

namespace Monster\Zhima;

class Config
{
    private $privateKey;
    private $publicKey;

    private $appId;
    private $platform = 'zmop';
    private $charset = 'UTF-8';
    private $channel;

    public function __construct()
    {
    }

    public function setPrivateKey($key)
    {
        $this->privateKey = $key;
    }

    public function setZhimaPublicKey($key)
    {
        $this->publicKey = $key;
    }

    public function setAppId($appId)
    {
        $this->appId = $appId;
    }

    public function setPlatform($platform)
    {
        $this->platform = $platform;
    }

    public function setCharset($charset)
    {
        $this->charset = $charset;
    }
    public function setChannel($channel)
    {
        $this->channel = $channel;
    }

    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    public function getZhimaPublicKey()
    {
        return $this->publicKey;
    }

    public function getAppId()
    {
        return $this->appId;
    }

    public function getPlatform()
    {
        return $this->platform;
    }

    public function getCharset()
    {
        return $this->charset;
    }

    public function getChannel()
    {
        return $this->channel;
    }
}
