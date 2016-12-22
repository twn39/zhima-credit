<?php

namespace Monster\Zhima;

use GuzzleHttp\ClientInterface;
use Monster\Zhima\Exceptions\ZhimaException;
use Monster\Zhima\Handlers\HandlerInterface;

class Client
{
    const REMOTE_URL = 'https://zmopenapi.zmxy.com.cn/openapi.do';
    private $httpClient;
    private $config;

    private $handler;

    public function __construct(ClientInterface $client, Config $config)
    {
        $this->httpClient = $client;
        $this->config = $config;
    }

    public function with(HandlerInterface $handler)
    {
        $this->handler = $handler;

        return $this;
    }

    public function fetch()
    {
        $queryData = [
            'app_id'   => $this->config->getAppId(),
            'charset'  => $this->config->getCharset(),
            'method'   => $this->handler->getMethod(),
            'version'  => '1.0',
            'channel'  => $this->config->getChannel(),
            'platform' => $this->config->getPlatform(),
            'sign'     => $this->sign(),
        ];
        ksort($queryData);

        $queryString = http_build_query($queryData);

        $response = $this->httpClient->request('POST', sprintf('%s?%s', self::REMOTE_URL, $queryString), [
            'form_params' => [
                'params' => $this->getEncryptParams(),
            ],
            'curl'        => [
                CURLOPT_SSL_VERIFYPEER => false,
            ],
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        // 确认签名是否有效
        $valid = $this->verifySign(RSA::decrypt($result['biz_response'], $this->config->getPrivateKey()), $result['biz_response_sign']);

        if (!$valid) {
            throw new ZhimaException('返回数据签名错误!');
        }

        if ($result['encrypted']) {
            $data = RSA::decrypt($result['biz_response'], $this->config->getPrivateKey());

            return json_decode($data, true);
        } else {
            return json_decode($result['biz_response'], true);
        }
    }

    protected function verifySign($response, $responseSign)
    {
        $valid = RSA::verify($response, $responseSign, $this->config->getZhimaPublicKey());

        return $valid;
    }

    protected function getEncryptParams()
    {
        $params = $this->handler->getParams();

        return RSA::encrypt($params, $this->config->getZhimaPublicKey());
    }

    protected function sign()
    {
        $params = $this->handler->getParams();

        return RSA::sign($params, $this->config->getPrivateKey());
    }
}
