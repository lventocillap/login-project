<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class UserNotFound extends BaseException
{
    public function __construct()
    {
        parent::__construct('User not found', Response::HTTP_NOT_FOUND);
    }
}
