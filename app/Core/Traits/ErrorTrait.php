<?php

namespace App\Core\Traits;

use App\Exceptions\Api\ApiServiceException;

trait ErrorTrait
{
    /**
     * @throws ApiServiceException
     */
    public function apiFail($errors, $code = 400)
    {
        throw new ApiServiceException($errors, $code);
    }

    /**
     * @throws ApiServiceException
     */
    public function bad($errors, $code = 400)
    {
        throw new ApiServiceException($errors, $code);
    }
}
