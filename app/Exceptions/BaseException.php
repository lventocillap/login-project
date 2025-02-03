<?php

namespace App\Exceptions;

use Exception;

class BaseException extends Exception
{
    public function __construct(
        string $message = "",
        protected int $statuscode = 500,
    )
    {
        parent::__construct($message, $statuscode);
    }
    public function getError():string
    {
        return $this->message;
    }
    public function getStatusCode():int
    {
        return $this->statuscode;
    }
}
