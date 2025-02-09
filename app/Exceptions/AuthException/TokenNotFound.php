<?php

namespace App\Exceptions\AuthException;

use App\Exceptions\BaseException;
use Exception;
use Illuminate\Http\Response;

class TokenNotFound extends BaseException
{
    public function __construct()
    {
        parent::__construct('Token not found', Response::HTTP_NOT_FOUND);
    }
}