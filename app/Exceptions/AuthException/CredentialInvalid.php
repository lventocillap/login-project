<?php

namespace App\Exceptions\AuthException;

use App\Exceptions\BaseException;
use Exception;
use Illuminate\Http\Response;

class CredentialInvalid extends BaseException
{
    public function __construct()
    {
        parent::__construct('Crendentials invalid',Response::HTTP_UNAUTHORIZED);
    }
}
