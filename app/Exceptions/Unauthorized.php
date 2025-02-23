<?php

namespace App\Exceptions;

use App\Http\Controllers\Apis\ApiController;
use Exception;
use Illuminate\Http\JsonResponse;

class Unauthorized extends Exception
{
    public function render(): JsonResponse
    {
        return (new ApiController)->unauthorized($this->message);
    }
}
