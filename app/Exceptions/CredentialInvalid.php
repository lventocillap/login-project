<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class CredentialInvalid extends BaseException
{
    public function __construct()
    {
        parent::__construct('Crendentials invalid',Response::HTTP_UNAUTHORIZED);
    }
}
