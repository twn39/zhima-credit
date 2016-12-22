<?php

namespace Monster\Zhima\Handlers;

abstract class HandlerAbstract
{
    protected $params = [];

    protected function getTransactionId()
    {
        return date('YmdHis').mt_rand(1000000, 9999999).mt_rand(100000, 999999);
    }
}
