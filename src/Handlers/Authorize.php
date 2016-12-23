<?php

namespace Monster\Zhima\Handlers;

class Authorize extends HandlerAbstract implements HandlerInterface
{
    const METHOD = 'zhima.auth.info.authorize';

    public function setIdentityType($type)
    {
        $this->params['identity_type'] = $type;
    }

    public function getIdentityType()
    {
        return $this->params['identity_type'];
    }

    public function setIdentityParam(array $param)
    {
        $this->params['identity_param'] = json_encode($param, JSON_UNESCAPED_UNICODE);
    }

    public function getIdentityParam()
    {
        return json_decode($this->params['identity_param'], true);
    }

    public function setBizParams(array $params)
    {
        $this->params['biz_params'] = json_encode($params, JSON_UNESCAPED_UNICODE);
    }

    public function getBizParams()
    {
        return json_decode($this->params['biz_params'], true);
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
