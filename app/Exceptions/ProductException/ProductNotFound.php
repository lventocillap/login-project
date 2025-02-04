<?php

namespace App\Exceptions\ProductException;

use App\Exceptions\BaseException;
use Exception;
use Illuminate\Http\Response;

class ProductNotFound extends BaseException
{
    public function __construct()
    {
        parent::__construct('Product not found', Response::HTTP_NOT_FOUND);
    }
}
