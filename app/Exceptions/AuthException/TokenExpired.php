<?php

namespace App\Exceptions\AuthException;

use App\Exceptions\BaseException;
use Exception;
use Illuminate\Http\Response;

class TokenExpired extends BaseException
{
    public function __construct()
    {
        parent::__construct("Token Expired", Response::HTTP_NOT_FOUND);
    }
}
