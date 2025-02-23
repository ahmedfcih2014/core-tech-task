<?php

namespace App\Http\Controllers\Apis;

use App\Http\Resources\Api\User\ProfileResource;

class ProfileController extends ApiController
{
    public function get()
    {
        return $this->success(ProfileResource::make($this->loggedInUser()));
    }
}
