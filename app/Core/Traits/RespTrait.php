<?php

namespace App\Core\Traits;


use App\Core\Utils\RespUtil;

trait RespTrait
{
    public function ok($data)
    {
        return RespUtil::ok($data);
    }

    public function bad($data)
    {
        return RespUtil::bad($data);
    }

    public function resp($data, $code)
    {
        return RespUtil::resp($data, $code);
    }
}
