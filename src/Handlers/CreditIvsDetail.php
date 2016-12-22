<?php

namespace Monster\Zhima\Handlers;

class CreditIvsDetail extends HandlerAbstract implements HandlerInterface
{
    const PRODUCT_CODE = 'w1010100000000000103';
    const METHOD = 'zhima.credit.ivs.detail.get';

    public function __construct()
    {
        $this->params['product_code'] = self::PRODUCT_CODE;
        $this->params['transaction_id'] = $this->getTransactionId();
    }

    public function setCertNo($no)
    {
        $this->params['cert_no'] = $no;
    }

    public function setCertType($type)
    {
        $this->params['cert_type'] = $type;
    }

    public function setName($name)
    {
        $this->params['name'] = $name;
    }

    public function setMobile($mobile)
    {
        $this->params['mobile'] = $mobile;
    }

    public function setEmail($email)
    {
        $this->params['email'] = $email;
    }

    public function setBankCard($bankcard)
    {
        $this->params['bank_card'] = $bankcard;
    }

    public function setAddress($address)
    {
        $this->params['address'] = $address;
    }

    public function setIp($ip)
    {
        $this->params['ip'] = $ip;
    }

    public function setMac($mac)
    {
        $this->params['mac'] = $mac;
    }

    public function setWifiMac($wifiMac)
    {
        $this->params['wifimac'] = $wifiMac;
    }

    public function setImei($imei)
    {
        $this->params['imei'] = $imei;
    }

    public function setImsi($imsi)
    {
        $this->params['imsi'] = $imsi;
    }

    public function getParams()
    {
        ksort($this->params);

        return http_build_query($this->params);
    }

    public function getMethod()
    {
        return self::METHOD;
    }
}
