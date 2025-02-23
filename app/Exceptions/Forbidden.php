<?php

namespace App\Exceptions;

use App\Http\Controllers\Apis\ApiController;
use Exception;
use Illuminate\Http\JsonResponse;

class Forbidden extends Exception
{
    public function render(): JsonResponse
    {
        return (new ApiController)->forbidden($this->message);
    }
}
