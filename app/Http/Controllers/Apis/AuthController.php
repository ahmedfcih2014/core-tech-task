<?php

namespace App\Http\Controllers\Apis;

use App\Events\User\Registered;
use App\Exceptions\Unauthorized;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Api\Auth\LoginResource;
use App\Models\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;

class AuthController extends ApiController
{
    public function register(RegisterRequest $registerRequest)
    {
        $user = User::create($registerRequest->validated());
        Event::dispatch(new Registered($user));
        return $this->success(['message' => 'You have registered successfully, go to login']);
    }

    public function login(LoginRequest $loginRequest)
    {
        $user = User::where('email', $loginRequest->email)->first();
        if (!$user || !Hash::check($loginRequest->password, $user->password)) {
            throw new Unauthorized("Invalid credentials");
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        return $this->success(LoginResource::make(['user' => $user, 'token' => $token]));
    }
}
