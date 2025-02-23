<?php

namespace App\Exceptions;

use App\Http\Controllers\Apis\ApiController;
use Exception;
use Illuminate\Contracts\Support\MessageBag;

class ValidationErrors extends Exception
{
    private MessageBag $errors;
    public function __construct(MessageBag $errors)
    {
        parent::__construct();
        $this->errors = $errors;
    }

    public function render()
    {
        $errors = [];
        foreach ($this->errors->getMessages() as $input => $inputErrors) {
            $errors[$input] = collect($inputErrors)->implode(",");
        }
        return (new ApiController)->validation($errors);
    }
}
