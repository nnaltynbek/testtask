<?php

namespace App\Exceptions\Api;

use App\Core\Utils\RespUtil;
use App\Exceptions\BaseException;
use Illuminate\Http\JsonResponse;

class ApiServiceException extends BaseException
{
    protected $errors;
    protected $code;

    /**
     * ApiServiceException constructor.
     * @param $errors
     * @param $code
     */
    public function __construct($errors, $code)
    {
        $this->errors = $errors;
        $this->code = $code;
    }

    public function getResponse(): JsonResponse
    {
        return RespUtil::resp($this->errors, $this->code);
    }
}
